<?php namespace EyeCore\Modules\PageTemplates\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class PageTemplateRequest
 * @package EyeCore\Modules\PageTemplates\Requests
 */
class PageTemplateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'view_file' => 'required'
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
