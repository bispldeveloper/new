<?php namespace EyeCore\Modules\MarketingReports\Presenters;

use Karl456\Presenter\Presenter;
use Carbon\Carbon;

/**
 * Class MarketingReportPresenter
 * @package EyeCore\Modules\MarketingReports\Presenters
 */
class MarketingReportPresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getName()
    {
        return ucwords($this->name);
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return Carbon::parse($this->published_date)->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function getSubmittedBy()
    {
        return ucwords($this->submitted_by);
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return 'https://www.eyeweb.co.uk/marketingreports/' . $this->client_id . '/' . $this->id . '/' . strtotime($this->created_at);
    }
}
