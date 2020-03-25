<?php namespace EyeCore\Modules\PageTemplateBlocks\Models;

use Eloquent, Image;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;
use EyeCore\Modules\PageTemplates\Models\PageTemplate;
use EyeCore\Modules\PageTemplateBlockContent\Models\PageTemplateBlockContent;

/**
 * Class PageTemplateBlock
 * @package EyeCore\Modules\PageTemplateBlocks\Models
 */
class PageTemplateBlock extends Eloquent
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
    protected $table = "pagetemplate_blocks";

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
    protected $presenter = '\EyeCore\Modules\PageTemplateBlocks\Presenters\PageTemplateBlockPresenter';

    /**
     * @return mixed
     */
    public function pagetemplate()
    {
        return $this->belongsTo(PageTemplate::class, 'pagetemplate_id');
    }

    /**
     * @return mixed
     */
    public function blockcontent()
    {
        return $this->hasMany(PageTemplateBlockContent::class, 'page_tb_id');
    }
}
