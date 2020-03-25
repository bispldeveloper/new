<?php namespace EyeCore\Modules\PageFormFields\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UpdatePageFormFieldRequest
 * @package EyeCore\Modules\PageFormFields\Requests
 */
class UpdatePageFormFieldRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|max:191',
            'label' => 'max:191'
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
