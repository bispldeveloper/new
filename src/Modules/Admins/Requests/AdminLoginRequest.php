<?php namespace EyeCore\Modules\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class AdminLoginRequest
 * @package EyeCore\Modules\Admins\Requests
 */
class AdminLoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required',
            'password' => 'required'
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
