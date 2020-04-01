<?php namespace EyeCore\Modules\SiteSettings\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\SiteSettings\Requests\SettingsRequest;
use EyeCore\Modules\SiteSettings\Repositories\SiteSettingRepository;

/**
 * Class AdminSiteSettingsController
 * @package EyeCore\Modules\SiteSettings\Controllers
 */
class AdminSiteSettingsController extends Controller
{
    /**
     * @var SiteSettingsRepo
     */
    private $siteSettingsRepo;

    /**
     * AdminSiteSettingsController constructor.
     * @param SiteSettingRepository $siteSettingsRepo
     */
    function __construct(SiteSettingRepository $siteSettingsRepo)
    {
        $this->siteSettingsRepo = $siteSettingsRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $sitesettings = $this->siteSettingsRepo->getAll(false, 'id', 'asc');
        return view('SiteSettings::Admin.index', compact('sitesettings'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('SiteSettings::Admin.create');
    }

    /**
     * @param SettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingsRequest $request)
    {
        if($sitesetting = $this->siteSettingsRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.sitesettings.index')
                ->with('flash_message', 'The site setting was added.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $sitesettings = $this->siteSettingsRepo->inputToArray(request()->except('_token'));

        foreach($sitesettings as $sitesetting) {
            $this->siteSettingsRepo->update($sitesetting['setting'], $sitesetting);
        }

        return back()
            ->with('flash_message', 'The site settings updated successfully.')
            ->with('flash_message_type', 'success');
    }
}
