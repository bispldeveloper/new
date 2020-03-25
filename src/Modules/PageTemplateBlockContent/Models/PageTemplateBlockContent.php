<?php namespace EyeCore\Modules\PageTemplateBlockContent\Models;

use Eloquent, Image;
use Karl456\Presenter\Traits\PresentableTrait;
use EyeCore\Modules\PageTemplateBlocks\Models\PageTemplateBlock;

/**
 * Class PageTemplateBlockContent
 * @package EyeCore\Modules\PageTemplateBlockContent\Models
 */
class PageTemplateBlockContent extends Eloquent
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "pagetemplateblocks_content";

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
    protected $presenter = '\EyeCore\Modules\PageTemplateBlockContent\Presenters\PageTemplateBlockContentPresenter';

    /**
     * @return mixed
     */
    public function pagetemplateblock()
    {
        return $this->belongsTo(PageTemplateBlock::class, 'page_tb_id');
    }
}
