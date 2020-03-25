<?php namespace EyeCore\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UpdateUserRequest
 * @package EyeCore\Modules\Users\Requests
 */
class UpdateUserRequest extends Request
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
            'username' => 'sometimes|required|unique:users,username,' . $this->route()->parameter('user')->id,
            'email' => 'sometimes|required|email|unique:users,email,' . $this->route()->parameter('user')->id,
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
