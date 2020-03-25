<?php namespace EyeCore\Providers;

use EyeCore\Modules\Branding\Models\Branding;
use EyeCore\Modules\Languages\Models\Language;
use EyeCore\Modules\MarketingSettings\Models\MarketingSetting;
use EyeCore\Modules\SiteSettings\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

/**
 * Class EyeCoreServiceProvider
 * @package EyeCore\Providers
 */
class EyeCoreServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        // register providers
        $this->app->register('EyeCore\Providers\MiddlewareServiceProvider');
        $this->app->register('EyeCore\Providers\ComposerServiceProvider');
        $this->app->register('EyeCore\Providers\ModuleServiceProvider');
        $this->app->register('EyeCore\Providers\ConsoleServiceProvider');
        $this->app->register('EyeCore\Providers\ValidatorServiceProvider');
        $this->app->register('EyeCore\Providers\NewsletterServiceProvider');
        $this->app->register('Collective\Html\HtmlServiceProvider');
        $this->app->register('Intervention\Image\ImageServiceProvider');
        $this->app->register('Barryvdh\DomPDF\ServiceProvider');
        $this->app->register('Spatie\Sitemap\SitemapServiceProvider');

        // register module providers
        $this->app->register('EyeCore\Modules\ImageResizer\ImageResizerServiceProvider');
        $this->app->register('EyeCore\Modules\Cloudflare\CloudflareServiceProvider');

        // register aliases
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
        $loader->alias('Image', 'Intervention\Image\Facades\Image');
        $loader->alias('ImageResizer', 'EyeCore\Modules\ImageResizer\Facades\ImageResizer');
        $loader->alias('Input', 'Illuminate\Support\Facades\Input');
        $loader->alias('Cloudflare', 'EyeCore\Modules\Cloudflare\Facades\Cloudflare');
        $loader->alias('PDF', 'Barryvdh\DomPDF\Facade');

        if(getenv('APP_ENV') == 'local') {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            $loader->alias('Debugbar', 'Barryvdh\Debugbar\Facade');
        }
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Modules/Admins/Config/admins.php' => config_path('admins.php'),
            __DIR__ . '/../Modules/Branding/Config/branding.php' => config_path('branding.php'),
            __DIR__ . '/../Modules/FileManager/Config/filemanager.php' => config_path('filemanager.php'),
            __DIR__ . '/../Modules/Languages/Config/languages.php' => config_path('languages.php'),
            __DIR__ . '/../Modules/MarketingReports/Config/marketingreports.php' => config_path('marketingreports.php'),
            __DIR__ . '/../Modules/MarketingSettings/Config/marketingsettings.php' => config_path('marketingsettings.php'),
            __DIR__ . '/../Modules/NavMenu/Config/navmenu.php' => config_path('navmenu.php'),
            __DIR__ . '/../Modules/Pages/Config/pages.php' => config_path('pages.php'),
            __DIR__ . '/../Modules/PageForms/Config/pageforms.php' => config_path('pageforms.php'),
            __DIR__ . '/../Modules/PageFormEnquiries/Config/pageformenquiries.php' => config_path('pageformenquiries.php'),
            __DIR__ . '/../Modules/PageTemplates/Config/pagetemplates.php' => config_path('pagetemplates.php'),
            __DIR__ . '/../Modules/SiteConfig/Config/siteconfig.php' => config_path('siteconfig.php'),
            __DIR__ . '/../Modules/SiteSettings/Config/sitesettings.php' => config_path('sitesettings.php'),
            __DIR__ . '/../Modules/Slideshow/Config/slideshows.php' => config_path('slideshows.php'),
            __DIR__ . '/../Modules/UrlRedirects/Config/urlredirects.php' => config_path('urlredirects.php'),
            __DIR__ . '/../Modules/Users/Config/users.php' => config_path('users.php'),
        ], 'config');

        if(getenv('MC_INSTALLED') == 'true') {
            $sitesettings = (object)SiteSetting::get()->pluck('value', 'setting')->all();
            $marketingsettings = (object)MarketingSetting::get()->pluck('value', 'setting')->all();
            $languages = (object)Language::get()->pluck('name', 'code')->all();

            if (!app()->runningInConsole()) {
                view()->share('sitesettings', $sitesettings);
                view()->share('marketingsettings', $marketingsettings);
                view()->share('languages', $languages);
                if (request()->is('mc-admin*')) {
                    view()->share('mc_branding', (object)Branding::where('id', 1)->first());
                }
            }

            app()->singleton('sitesettings', function () use ($sitesettings) {
                return $sitesettings;
            });
            app()->singleton('marketingsettings', function () use ($marketingsettings) {
                return $marketingsettings;
            });
            app()->singleton('languages', function () use ($languages) {
                return $languages;
            });
        }
        

        /**
         * Fix for: Specified key was too long error
         */
        Schema::defaultStringLength(191);
    }

}
