<?php namespace EyeCore\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Class ModuleServiceProvider
 * @package EyeCore\Providers
 */
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * @var string
     */
    private $manifestPath;

    /**
     * @var array|mixed
     */
    private $modules;

    /**
     * @var RouteServiceProvider
     */
    private $routes;

    /**
     * @var ViewServiceProvider
     */
    private $views;

    /**
     * @var TranslationServiceProvider
     */
    private $translations;

    /**
     * ModuleServiceProvider constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->files = new Filesystem();
        $this->manifestPath = base_path('bootstrap/cache/modules.php');
        $this->modules = $this->loadModules();
        $this->app = $app;
        $this->routes = new RouteServiceProvider($app);
        $this->views = new ViewServiceProvider($app);
        $this->translations = new TranslationServiceProvider($app);
    }

    /**
     * Register the modules bindings
     */
    public function register()
    {
        // bind them to the app
        foreach($this->modules as $module) {
            // bind the interface and repository
            if(isset($module['interface']) && isset($module['repository'])) {
                App::bind($module['interface'], $module['repository']);
            }
        }
    }

    /**
     * Load in modules routes and views
     */
    public function boot()
    {
        Route::get('/_debugbar/assets/stylesheets', '\Barryvdh\Debugbar\Controllers\AssetController@css');
        Route::get('/_debugbar/assets/javascript', '\Barryvdh\Debugbar\Controllers\AssetController@js');
        $included = [];
        foreach($this->modules as $moduleName => $module) {

            // include web routes
            if(isset($module['routes']['web'])) {
                // routes file is set
                $routesFiles = $module['routes']['web'];
                foreach($routesFiles as $routesFile) {
                    if($this->files->exists($routesFile)) {
                        $included[] = $routesFile;
                        // routes file exists, let's include it
                        Route::group(['middleware' => ['web', 'urlredirects', 'staging', 'language']], function($router) use ($routesFile) {
                            require $routesFile;
                        });
                    }
                }
            }

            // include web routes
            if(isset($module['routes']['api'])) {
                // routes file is set
                $routesFiles = $module['routes']['api'];
                foreach($routesFiles as $routesFile) {
                    if($this->files->exists($routesFile)) {
                        // routes file exists, let's include it
                        Route::group(['middleware' => 'api'], function($router) use ($routesFile) {
                            require $routesFile;
                        });
                    }
                }
            }

            // register views
            if(isset($module['views'])) {
                $this->views->loadViewsFrom($module['views'], $moduleName);
            }

            // register migrations
            if(isset($module['migrations'])) {
                foreach($module['migrations'] as $migration) {
                    $this->loadMigrationsFrom($migration);
                }
            }
        }

        Route::group(['middleware' => ['web', 'urlredirects', 'staging']], function($router) use ($routesFile) {
            Route::post('{pageform?}', ['as' => 'pageforms.enquire', 'uses' => '\Modules\PageFormEnquiries\Controllers\PageFormEnquiryController@enquire'])->middleware(\Spatie\Honeypot\ProtectAgainstSpam::class)->where('pageformslug', '.+');
            Route::get('{pageform?}/thanks', ['as' => 'pageforms.thanks', 'uses' => '\Modules\PageFormEnquiries\Controllers\PageFormEnquiryController@thanks'])->where('pageformslug', '.+');
            Route::get('{slug?}', ['as' => 'page.show', 'uses' => '\Modules\Pages\Controllers\PageController@show'])->where('slug', '.+');
        });
    }

    /**
     * Load the modules either from the manifest file
     * or generate a new manifest
     * @return array|mixed
     */
    public function loadModules()
    {
        // manifest file exists, let's require it
        if($this->files->exists($this->manifestPath)) {
            return $this->files->getRequire($this->manifestPath);
        }

        // manifest file didn't exist, let's reload the modules and create a manifest file
        return $this->setModules();
    }

    /**
     * Set the modules in a manifest file
     * @return array
     */
    public function setModules()
    {
        // get the modules
        $coreModules = $this->getModules(base_path('vendor/eyeweb/eyecore/src/Modules'));

        // get package modules
        $packageFiles = File::glob(base_path('vendor/eyeweb/*/src/Modules'));
        foreach($packageFiles as $packageFile) {
            if(Str::contains($packageFile, 'eyecore')) {
                continue;
            }
            foreach($this->getModules($packageFile) as $key => $packageModule) {
                $coreModules[$key] = $packageModule;
            }
        }

        // get custom modules
        $customModules = $this->getModules(base_path('modules'));

        $modules = array_merge($customModules, $coreModules);

        // store them in the manifest file
        if(getenv('APP_ENV') == 'production') {
            $this->files->put($this->manifestPath, '<?php return ' . var_export($modules, true) . ';');
        }

        // return the modules array
        return $modules;
    }

    /**
     * Iterate through the directories and generate an
     * array of modules
     * @return array
     */
    public function getModules($directory)
    {
        // loop through all files within the modules directory
        $files = File::allFiles($directory);

        $modules = [];
        // create an array of module and their repositories/interfaces
        // e.g. ['Module' => ['repository' => FILEPATH, 'interface' => FILEPATH]]
        foreach($files as $file) {
            $explodedFile = explode('/', $file->getRelativePathname());
            $moduleName = $explodedFile[0];
            if(!isset($modules[$moduleName]['repository']) && Str::contains(last($explodedFile), 'Repository')) {
                $modules[$moduleName]['repository'] = $this->getNamespace($file->getPathname()) . '\\' . pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            }
            if(!isset($modules[$moduleName]['interface']) && Str::contains(last($explodedFile), 'Interface')) {
                $modules[$moduleName]['interface'] = $this->getNamespace($file->getPathname()) . '\\' . pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            }
            if(!isset($modules[$moduleName]['routes']['web']) && Str::contains(last($explodedFile), 'Web')) {
                $modules[$moduleName]['routes']['web'][] = $this->core_path($moduleName . DIRECTORY_SEPARATOR . 'Routes/' . $file->getFilename());
                $modules[$moduleName]['routes']['web'][] = $this->package_path($file->getPathName());
                $modules[$moduleName]['routes']['web'][] = $this->custom_path($moduleName . DIRECTORY_SEPARATOR . 'Routes/' . $file->getFilename());
            }
            if(!isset($modules[$moduleName]['routes']['api']) && Str::contains(last($explodedFile), 'Api')) {
                $modules[$moduleName]['routes']['api'][] = $this->core_path($moduleName . DIRECTORY_SEPARATOR . 'Routes/' . $file->getFilename());
                $modules[$moduleName]['routes']['api'][] = $this->package_path($file->getPathName());
                $modules[$moduleName]['routes']['api'][] = $this->custom_path($moduleName . DIRECTORY_SEPARATOR . 'Routes/' . $file->getFilename());
            }
            if(!isset($modules[$moduleName]['views']) && is_dir($directory . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'Resources/Views')) {
                $modules[$moduleName]['views'][] = $this->custom_path($moduleName . DIRECTORY_SEPARATOR . 'Resources/Views');
                $modules[$moduleName]['views'][] = $directory . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'Resources/Views';
                $modules[$moduleName]['views'][] = $this->core_path($moduleName . DIRECTORY_SEPARATOR . 'Resources/Views');
            }
            if(!isset($modules[$moduleName]['migrations'])) {
                $modules[$moduleName]['migrations'][] = $this->core_path($moduleName . DIRECTORY_SEPARATOR . 'Database/Migrations');
                $modules[$moduleName]['migrations'][] = $directory . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'Database/Migrations';
                $modules[$moduleName]['migrations'][] = $this->custom_path($moduleName . DIRECTORY_SEPARATOR . 'Database/Migrations');
            }
        }

        return $modules;
    }

    /**
     * @param $file
     * @return null|string
     */
    public function getNamespace($file)
    {
        $ns = NULL;
        $handle = fopen($file, "r");
        if($handle) {
            while(($line = fgets($handle)) !== false) {
                if(strpos($line, '<?php namespace') !== false) {
                    $parts = explode(' ', $line);
                    $ns = rtrim(trim($parts[2]), ';');
                    break;
                }
            }
            fclose($handle);
        }
        return $ns;
    }

    /**
     * @param $dir
     * @return string
     */
    public function core_path($dir)
    {
        return base_path('vendor/eyeweb/eyecore/src/Modules/' . $dir);
    }

    /**
     * @param $dir
     * @return string
     */
    public function package_path($dir)
    {
        if(!Str::contains('eyecore', $dir)) {
            $explodeDir = explode('vendor', $dir);
            if(isset($explodeDir[1])) {
                return base_path('vendor' . $explodeDir[1]);
            }
        }
        return base_path('vendor/eyeweb/' . $dir);
    }

    /**
     * @param $dir
     * @return string
     */
    public function custom_path($dir)
    {
        return base_path('modules/' . $dir);
    }
}
