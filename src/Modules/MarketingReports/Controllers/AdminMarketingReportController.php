<?php namespace EyeCore\Modules\MarketingReports\Controllers;

use App\Http\Controllers\Controller;
use EyeCore\Modules\MarketingReports\Repositories\MarketingReportRepository;

/**
 * Class AdminMarketingReportController
 * @package EyeCore\Modules\MarketingReports\Controllers
 */
class AdminMarketingReportController extends Controller
{
    /**
     * @var MarketingReportRepository
     */
    private $marketingreportRepo;

    /**
     * AdminMarketingReportController constructor.
     * @param MarketingReportRepository $marketingreportRepo
     */
    function __construct(MarketingReportRepository $marketingreportRepo)
    {
        $this->marketingreportRepo = $marketingreportRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed|string|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $marketingreports = $this->marketingreportRepo->getAll(20, (request()->has('sort_by') ? request()->input('sort_by') : 'published_date'), (request()->has('sort_order') ? request()->input('sort_order') : 'desc'));

        return view('MarketingReports::Admin.index', compact('marketingreports'));
    }
}
