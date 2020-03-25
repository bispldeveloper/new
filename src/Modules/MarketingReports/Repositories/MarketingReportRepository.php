<?php namespace EyeCore\Modules\MarketingReports\Repositories;

use EyeCore\EloquentRepository;
use EyeCore\Modules\MarketingReports\Models\MarketingReport;

/**
 * Class MarketingReportRepository
 * @package EyeCore\Modules\MarketingReports\Repositories
 */
class MarketingReportRepository extends EloquentRepository implements MarketingReportInterface
{
    /**
     * @var MarketingReport
     */
    private $model;

    /**
     * @param MarketingReport $model
     */
    function __construct(MarketingReport $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getRecent()
    {
        return $this->model->where('seen_admin_id', null)
            ->orderBy('published_date', 'desc')
            ->where('client_id', getenv('EYEWEB_CLIENT_ID'))
            ->first();
    }
}
