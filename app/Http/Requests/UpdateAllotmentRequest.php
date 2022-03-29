<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllotmentRequest extends FormRequest
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
            'sector_id'=>'required',
            'allotment_date'=>'required',
            'reference_no'=>'sometimes|nullable',
            'status'=>'required',

            'plot_allocations.*.plot_allotment_id' => 'required',
            'plot_allocations.*.special_economic_zone_id' => 'required',
            'plot_allocations.*.plot_type' => 'required',
            'plot_allocations.*.plot_id' => 'required',
            'plot_allocations.*.plot_size' => 'required',
            'plot_allocations.*.rate_per_acre' => 'required',
            'plot_allocations.*.rate_additional_corner' => 'sometimes|nullable',
            'plot_allocations.*.rate_additional_main_road' => 'sometimes|nullable',
        ];
    }

    public function messages()
    {
        return [
            'plot_allocations.*.plot_allotment_id.required'=> 'Plot allotment is required.',
            'plot_allocations.*.special_economic_zone_id.required'=> 'Economic zone is required.',
            'plot_allocations.*.plot_type.required'=> 'Plot type is required.',
            'plot_allocations.*.plot_id.required'=> 'Plot No. is required.',
            'plot_allocations.*.plot_size.required'=> 'Plot size is required.',
            'plot_allocations.*.rate_per_acre.required'=> 'Plot rate per acre is required.',
        ];
    }
}
