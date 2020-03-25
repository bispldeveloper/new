<?php namespace EyeCore\Modules\MarketingReports\Models;

use Eloquent, SoftDeletingTrait;
use EyeCore\Modules\Admins\Models\Admin;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MarketingReport
 * @package EyeCore\Modules\MarketingReports\Models
 */
class MarketingReport extends Eloquent
{
    use PresentableTrait;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = 'EyeCore\Modules\MarketingReports\Presenters\MarketingReportPresenter';

    /**
     * @var string
     */
    protected $table = "marketing_reports";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @var string
     */
    protected $connection = 'eyeweb';

    /**
     * Admingroup relation
     * @return mixed
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'seen_admin_id');
    }
}
