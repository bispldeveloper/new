<?php namespace EyeCore\Modules\Branding\Models;

use Eloquent, SoftDeletingTrait;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Branding
 * @package EyeCore\Modules\Branding\Models
 */
class Branding extends Eloquent
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
    protected $presenter = 'EyeCore\Modules\Branding\Presenters\BrandingPresenter';

    /**
     * @var string
     */
    protected $table = "branding";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
