<?php namespace EyeCore\Modules\UrlRedirects\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class UrlRedirectRequest
 * @package EyeCore\Modules\UrlRedirects\Requests
 */
class UrlRedirectRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'required',
            'to' => 'required',
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
