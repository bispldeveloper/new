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
        $marketingreports = $this->marketingreportRepo->getAll(20, 'published_date', 'desc', ['client_id' => getenv('EYEWEB_CLIENT_ID')]);

        return view('MarketingReports::Admin.index', compact('marketingreports'));
    }
}
