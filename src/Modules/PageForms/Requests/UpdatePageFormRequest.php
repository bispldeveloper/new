<?php namespace EyeCore\Modules\PageForms\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UpdatePageFormRequest
 * @package EyeCore\Modules\PageForms\Requests
 */
class UpdatePageFormRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'name' => 'required|max:191',
            'email_to' => 'required|email|max:191',
            'email_from' => 'required|email|max:191',
            'email_subject' => 'required|max:191',
            'newsletter_list_id' => 'required_if:has_newsletter,1|max:191'
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
