<?php namespace EyeCore\Modules\Images\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class Image
 * @package EyeCore\Modules\Images\Models
 */
class Image extends Eloquent
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
    protected $presenter = '\EyeCore\Modules\Images\Presenters\ImagePresenter';

    /**
     * @var string
     */
    protected $table = "images";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

}
