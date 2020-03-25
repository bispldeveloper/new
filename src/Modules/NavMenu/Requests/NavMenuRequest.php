<?php namespace EyeCore\Modules\NavMenu\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class NavMenuRequest
 * @package EyeCore\Modules\NavMenu\Requests
 */
class NavMenuRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required'
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
