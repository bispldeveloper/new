<?php namespace EyeCore\Modules\Admins\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\PageFormEnquiries\Repositories\PageFormEnquiryRepository;
use EyeCore\Modules\Pages\Repositories\PageRepository;
use EyeCore\Modules\MarketingReports\Repositories\MarketingReportRepository;
use Mail, URL, Config, File;

/**
 * Class AdminDashboardController
 * @package EyeCore\Modules\Admins\Controllers
 */
class AdminDashboardController extends Controller
{
    /**
     * @var PageRepository
     */
    private $pageRepo;

    /**
     * @var PageFormEnquiryRepository
     */
    private $pageFormEnquiryRepo;

    /**
     * @var MarketingReportRepository
     */
    private $marketingReportsRepo;

    /**
     * AdminDashboardController constructor.
     * @param PageRepository $pageRepo
     * @param PageFormEnquiryRepository $pageFormEnquiryRepo
     * @param MarketingReportRepository $marketingReportsRepo
     */
    function __construct(PageRepository $pageRepo, PageFormEnquiryRepository $pageFormEnquiryRepo, MarketingReportRepository $marketingReportsRepo)
    {
        $this->pageRepo = $pageRepo;
        $this->pageFormEnquiryRepo = $pageFormEnquiryRepo;
        $this->marketingReportsRepo = $marketingReportsRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $pages = $this->pageRepo->getLatest(5);
        $enquiries = $this->pageFormEnquiryRepo->getLatest(5);
        $marketingreport = false;
        if(env('EYEWEB_CLIENT_ID') != '') {
            $marketingreport = $this->marketingReportsRepo->getRecent();
        }

        $mcErrors = [];
        if(auth()->guard('admins')->user()->id == 1) {
            if(!File::isWritable(base_path() . '/.env')) {
                $mcErrors[] = 'Env file is not writable';
            }
            if(!File::isWritable(base_path() . '/public/robots.txt')) {
                $mcErrors[] = 'robots.txt is not writable';
            }
        }

        return view('Admins::Admin.dashboard.index', compact('pages', 'enquiries', 'mcErrors', 'marketingreport'));
    }
}
