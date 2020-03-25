<?php namespace EyeCore\Modules\PageFormEnquiries\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class CreatePageFormEnquiryRequest
 * @package EyeCore\Modules\PageFormEnquiries\Requests
 */
class CreatePageFormEnquiryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        $pageform = $this->route()->parameter('pageform');
        $pageform->load('fields', 'fields.fieldtype');

        $validation = [];
        foreach($pageform->fields as $field) {
            if($field->required) {
                $validation[$field->name_snakecase] = 'required';
            }
        }

        return $validation;
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
