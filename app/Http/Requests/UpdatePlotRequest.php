<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlotRequest extends FormRequest
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
            'special_economic_zone_id'=>'required|integer',
            'plot_no'=>['required', 'integer','digits_between:1,10',Rule::unique('plots', 'plot_no')->ignore($this->plot)->where('special_economic_zone_id', $this->special_economic_zone_id)],
            'plot_type'=>'required|string',
            'plot_size'=>'required|integer|digits_between:1,20',
            'plot_status'=>'required|string',
            'latitude'=>'sometimes|nullable',
            'longitude'=>'sometimes|nullable',
            'status'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'plot_no.unique' => 'This plot is already exist.',
        ];
    }
}
