<?php namespace EyeCore\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UserRequest
 * @package EyeCore\Modules\Users\Requests
 */
class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'username' => 'sometimes|required|unique:users',
            'email' => 'sometimes|required|email|unique:users',
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required'
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
