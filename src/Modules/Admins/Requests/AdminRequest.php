<?php namespace EyeCore\Modules\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class AdminRequest
 * @package EyeCore\Modules\Admins\Requests
 */
class AdminRequest extends Request
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
            'username' => 'sometimes|required|unique:admins',
            'email' => 'sometimes|required|email|unique:admins',
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required'
        ];
    }

    /**
     * Determine if the admin is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
