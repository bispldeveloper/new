<?php namespace EyeCore\Modules\Languages\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UpdateLanguageRequest
 * @package EyeCore\Modules\Languages\Requests
 */
class UpdateLanguageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:languages,code,' . $this->route()->parameter('language')->id
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
