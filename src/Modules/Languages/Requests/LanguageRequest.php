<?php namespace EyeCore\Modules\Languages\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class LanguageRequest
 * @package EyeCore\Modules\Languages\Requests
 */
class LanguageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:languages'
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
