<?php namespace EyeCore\Modules\PageForms\Models;

use Eloquent;
use EyeCore\Modules\PageFormFields\Models\PageFormField;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class PageForm
 * @package EyeCore\Modules\PageForms\Models
 */
class PageForm extends Eloquent
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = '\EyeCore\Modules\PageForms\Presenters\PageFormPresenter';

    /**
     * @var string
     */
    protected $table = "page_forms";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        if(request()->is('mc-admin*')) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * @return mixed
     */
    public function fields()
    {
        return $this->hasMany(PageFormField::class, 'form_id', 'id')->orderBy('sort_order', 'asc');
    }

    /**
     * @return mixed
     */
    public function newsletterfields()
    {
        return $this->fields()->where('is_newsletter_field', true);
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

}
