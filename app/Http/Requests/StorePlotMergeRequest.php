<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlotMergeRequest extends FormRequest
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
            'special_economic_zone_id'=> 'required',
            'plot_type'=> 'required',
            'plot_no'=>['required', 'integer','not_in:0','digits_between:1,10',Rule::unique('plots', 'plot_no')->where('special_economic_zone_id', $this->special_economic_zone_id)],
            'plot_size'=>'required|integer|not_in:0',
            'merge_plots'=>'required|array|min:2',
            'latitude'=>'sometimes|nullable',
            'longitude'=>'sometimes|nullable',
        ];
    }

    public function messages()
    {
        return [
            'plot_no.unique' => 'This plot is already exist.',
        ];
    }
}
