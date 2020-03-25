<?php namespace EyeCore\Modules\PageFormEnquiries\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class AdminUpdatePageFormEnquiryRequest
 * @package EyeCore\Modules\PageFormEnquiries\Requests
 */
class AdminUpdatePageFormEnquiryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required'
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
