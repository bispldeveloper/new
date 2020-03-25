<?php namespace EyeCore\Modules\NavMenuItem\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class NavMenuItemRequest
 * @package EyeCore\Modules\NavMenuItem\Requests
 */
class NavMenuItemRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required'
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
