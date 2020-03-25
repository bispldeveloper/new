<?php namespace EyeCore\Modules\PageFormFields\Models;

use Eloquent;
use EyeCore\Modules\PageFormFieldTypes\Models\PageFormFieldType;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class PageFormField
 * @package EyeCore\Modules\PageFormFields\Models
 */
class PageFormField extends Eloquent
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = '\EyeCore\Modules\PageFormFields\Presenters\PageFormFieldPresenter';

    /**
     * @var string
     */
    protected $table = "page_form_fields";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return mixed
     */
    public function fieldtype()
    {
        return $this->belongsTo(PageFormFieldType::class, 'form_field_type_id', 'id');
    }

    /**
     * @param $value
     * @return string
     */
    public function getNameSnakecaseAttribute($value)
    {
        return snake_case($this->attributes['name']);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function setOptionsAttribute($value)
    {
        if(! is_null($value)) {
            $this->attributes['options'] = json_encode(explode("\r\n", $value));
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getOptionsAttribute($value)
    {
        if(! is_null($value)) {
            return implode("\r\n", json_decode($value));
        }
    }

    /**
     * @param $value
     * @return array
     */
    public function getOptionsArrayAttribute($value)
    {
        $array = [];

        if(! is_null($this->attributes['options'])) {
            $json = json_decode($this->attributes['options']);
            foreach($json as $j) {
                $array[$j] = $j;
            }
        }

        return $array;
    }

}
