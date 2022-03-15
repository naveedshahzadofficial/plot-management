<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSpecialEconomicZoneRequest extends FormRequest
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
            'user_id'=>'required|integer',
            'name'=>['required', 'string','max:100',Rule::unique('special_economic_zones', 'name')->where('user_id', $this->user_id)->whereNull('deleted_at')],
            'district_id'=>'required|integer',
            'total_area'=>'required',
            'industrial_area'=>'required',
            'industrial_total_plots'=>'required',
            'commercial_area'=>'required',
            'commercial_total_plots'=>'required',
            'infrastructure_area'=>'required',
            'parks_area'=>'required',
            'amenities_area'=>'required',
            'other_area'=>'sometimes|nullable',
            'latitude'=>'required',
            'longitude'=>'required',
            'status'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'This Special Economic Zone is already exist.',
        ];
    }
}
