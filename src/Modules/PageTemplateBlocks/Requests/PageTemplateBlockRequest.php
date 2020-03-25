<?php namespace EyeCore\Modules\PageTemplateBlocks\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class PageTemplateBlockRequest
 * @package EyeCore\Modules\PageTemplateBlocks\Requests
 */
class PageTemplateBlockRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'field_name' => 'required'
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
