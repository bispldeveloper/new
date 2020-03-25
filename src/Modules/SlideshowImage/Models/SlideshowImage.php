<?php namespace EyeCore\Modules\SlideshowImage\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\Slideshow\Models\Slideshow;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class SlideshowImage
 * @package EyeCore\Modules\SlideshowImage\Models
 */
class SlideshowImage extends Eloquent
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $touches = ['slideshow'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "slides";

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
    protected $presenter = 'EyeCore\Modules\Slideshow\Presenters\SlideshowImagePresenter';

    /**
     * @return mixed
     */
    public function slideshow()
    {
        return $this->belongsTo(Slideshow::class, 'slideshow_id');
    }
}
