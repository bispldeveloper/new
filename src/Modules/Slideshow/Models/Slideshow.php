<?php namespace EyeCore\Modules\Slideshow\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;
use EyeCore\Modules\Pages\Models\Page;
use EyeCore\Modules\SlideshowImage\Models\SlideshowImage;

/**
 * Class Slideshow
 * @package EyeCore\Modules\Slideshow\Models
 */
class Slideshow extends Eloquent
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "slideshows";

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
    protected $presenter = 'EyeCore\Modules\Slideshow\Presenters\SlideshowPresenter';

    /**
     * @return mixed
     */
    public function slides()
    {
        return $this->hasMany(SlideshowImage::class, 'slideshow_id')->orderBy('sort_order', 'asc');
    }

    /**
     * @return mixed
     */
    public function pages()
    {
        return $this->hasMany(Page::class, 'slideshow_id');
    }
}
