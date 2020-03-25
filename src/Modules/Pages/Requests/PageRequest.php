<?php namespace EyeCore\Modules\Pages\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class PageRequest
 * @package EyeCore\Modules\Pages\Requests
 */
class PageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'pagetemplate_id' => 'required',
            'slug' => 'required|unique:pages',
            'title' => 'required',
            'slideshow_id' => 'sometimes|integer',
            'meta_title' => 'sometimes|max:70',
            'meta_description' => 'sometimes|max:156'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
