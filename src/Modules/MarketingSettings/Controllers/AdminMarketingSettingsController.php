<?php namespace EyeCore\Modules\MarketingSettings\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Exports\PageMetaExport;
use EyeCore\Imports\PageMetaImport;
use Maatwebsite\Excel\Facades\Excel;
use EyeCore\Modules\MarketingSettings\Requests\MarketingSettingsRequest;
use EyeCore\Modules\MarketingSettings\Repositories\MarketingSettingsRepository;

/**
 * Class AdminMarketingSettingsController
 * @package EyeCore\Modules\MarketingSettings\Controllers
 */
class AdminMarketingSettingsController extends Controller
{
    /**
     * @var MarketingSettingsRepository
     */
    private $settingsRepo;

    /**
     * AdminMarketingSettingsController constructor.
     * @param MarketingSettingsRepository $settingsRepo
     */
    function __construct(MarketingSettingsRepository $settingsRepo)
    {
        $this->settingsRepo = $settingsRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $marketingsettings = $this->settingsRepo->getAll();
        return view('MarketingSettings::Admin.index', compact('marketingsettings'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create()
    {
        return view('MarketingSettings::Admin.create');
    }

    /**
     * @param MarketingSettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MarketingSettingsRequest $request)
    {
        if($this->settingsRepo->create($request->input())) {
            return redirect()
                ->route('mc-admin.marketingsettings.index')
                ->with('flash_message', 'The marketing setting was added.')
                ->with('flash_message_type', 'success');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $sitesettings = $this->settingsRepo->inputToArray(request()->except('_token'));

        foreach($sitesettings as $sitesetting) {
            $this->settingsRepo->update($sitesetting['setting'], $sitesetting);
        }

        return back()
            ->with('flash_message', 'The marketing settings updated successfully.')
            ->with('flash_message_type', 'success');
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return Excel::download(new PageMetaExport, 'pages.xlsx');
    }

    /**
     * @return mixed
     */
    public function import()
    {
        Excel::import(new PageMetaImport, request()->file('file'));

        return redirect()->route('mc-admin.marketingsettings.index')
            ->with('flash_message', 'Page Meta imported successfully.')
            ->with('flash_message_type', 'success');
    }
}
