<?php namespace EyeCore\Modules\MarketingSettings\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class MarketingSettingsRequest
 * @package EyeCore\Modules\MarketingSettings\Requests
 */
class MarketingSettingsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'setting' => 'required',
            'value' => 'required'
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
