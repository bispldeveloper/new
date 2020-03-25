<?php namespace EyeCore\Modules\SiteConfig\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\EnvironmentVariables\Repositories\EnvironmentVariableRepository;
use EyeCore\Modules\RobotsTxt\Repositories\RobotsTxtRepository;
use EyeCore\Modules\Apis\Cloudflare\Facades\Cloudflare;
use File;
use Illuminate\Support\Facades\Artisan;

/**
 * Class AdminSiteConfigController
 * @package EyeCore\Modules\SiteConfig\Controllers
 */
class AdminSiteConfigController extends Controller
{
    /**
     * @var RobotsTxtRepo
     */
    private $robotsTxtRepo;

    /***
     * AdminSiteConfigController constructor.
     * @param RobotsTxtRepository $robotsTxtRepo
     */
    function __construct(RobotsTxtRepository $robotsTxtRepo)
    {
        $this->robotsTxtRepo = $robotsTxtRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $robots_txt = $this->robotsTxtRepo->getConfig();
        return view('SiteConfig::Admin.index', compact('robots_txt'));
    }


    public function confirmGitPull()
    {
        return view('SiteConfig::Admin.confirm-gitpull');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function gitpull()
    {
        if(env('CLOUDFLARE_ZONE_ID') != '') {
            Cloudflare::purge();
        }
        exec('sudo git pull 2>&1', $output);
        Artisan::call('migrate --force');
        if(file_exists(base_path('bootstrap/cache/modules.php'))) {
            unlink(base_path('bootstrap/cache/modules.php'));
        }
        return redirect()
            ->route('mc-admin.siteconfig.index')
            ->with('flash_message', $output[0] . ' and cloudflare purged')
            ->with('flash_message_type', 'success');
    }

    /**
     * @param EnvironmentVariableRepository $environmentVariableRepo
     */
    public function changeDebugMode(EnvironmentVariableRepository $environmentVariableRepo)
    {
        $debugmode = request()->input('debugmode');
        $environmentVariableRepo->updateExisting('APP_DEBUG', [
            'name' => 'APP_DEBUG',
            'value' => ($debugmode ? 'TRUE' : 'FALSE')
        ]);
    }
}
