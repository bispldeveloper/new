<?php namespace EyeCore\Modules\Pages\Models;

use Eloquent, SoftDeletingTrait;
use EyeCore\Modules\PageForms\Models\PageForm;
use Illuminate\Support\Facades\Cookie;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use EyeCore\Modules\PageTemplates\Models\PageTemplate;
use EyeCore\Modules\Slideshow\Models\Slideshow;
use EyeCore\Modules\PageTemplateBlockContent\Models\PageTemplateBlockContent;

/**
 * Class Page
 * @package Eyeweb\Pages
 */
class Page extends Eloquent
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
    protected $presenter = '\EyeCore\Modules\Pages\Presenters\PagePresenter';

    /**
     * @var string
     */
    protected $table = "pages";

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
     * @return mixed
     */
    public function pageTemplate()
    {
        return $this->belongsTo(PageTemplate::class, 'pagetemplate_id')->with('blocks');
    }

    /**
     * @return mixed
     */
    public function slideshow()
    {
        return $this->belongsTo(Slideshow::class, 'slideshow_id');
    }

    /**
     * Gets content out based on a page id and template block id, for use in the admin
     * @return mixed
     */
    public function pagetemplateblockcontent()
    {
        return $this->belongsToMany(PageTemplateBlockContent::class, 'pagetemplateblocks_content', 'page_id', 'page_tb_id')
            ->withPivot('language')
            ->withTimestamps();
    }

    /**
     * Gets the content out based on just a page id, for use on the frontend
     * @return mixed
     */
    public function pagecontent()
    {
        return $this->hasMany(PageTemplateBlockContent::class, 'page_id');
    }

    /**
     * @return mixed
     */
    public function pageform()
    {
        return $this->belongsTo(PageForm::class, 'page_form_id', 'id');
    }

    /**
     * @param $value
     */
    public function setSlideshowIdAttribute($value)
    {
        if($value == 0) {
            $this->attributes['slideshow_id'] = null;
        } else {
            $this->attributes['slideshow_id'] = $value;
        }
    }

    /**
     * @return PageTemplateBlockContent
     */
    public function preparePageContent()
    {
        $this->load('pagecontent', 'pagecontent.pagetemplateblock');

        $pagecontent = $this->pagecontent->where('language', 'en');
        $content_object = new PageTemplateBlockContent();
        foreach($pagecontent as $content) {
            $content_name = $content->pagetemplateblock->field_name;
            $content_object->$content_name = $content->content;
        }

        if(app()->getLocale() != 'en') {
            $pagecontent = $this->pagecontent->where('language', app()->getLocale())->where('content', '!=', '');
            foreach($pagecontent as $content) {
                $content_name = $content->pagetemplateblock->field_name;
                $content_object->$content_name = $content->content;
            }
        }

        return $content_object;
    }

    /**
     * @return mixed
     */
    public function preparePageForm()
    {
        $this->load('pageform', 'pageform.fields', 'pageform.fields.fieldtype');

        return $this->pageform;
    }

}
