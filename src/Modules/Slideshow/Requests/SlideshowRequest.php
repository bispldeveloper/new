<?php namespace EyeCore\Modules\Slideshow\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class SlideshowRequest
 * @package EyeCore\Modules\Slideshow\Requests
 */
class SlideshowRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
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
