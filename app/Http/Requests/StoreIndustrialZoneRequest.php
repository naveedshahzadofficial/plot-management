<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIndustrialZoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sector_id'=>['required','integer', Rule::unique('industrial_zones', 'sector_id')->where('special_economic_zone_id', $this->special_economic_zone->id)->whereNull('deleted_at')],
            'area'=>'required|numeric|not_in:0',
            'status'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'sector_id.unique' => 'This Industrial Sector already exist.',
        ];
    }
}
