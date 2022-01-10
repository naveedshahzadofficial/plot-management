<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlotSplitRequest extends FormRequest
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
            'new_plots.*.plot_no'=>['required', 'integer','not_in:0','digits_between:1,10','distinct',Rule::unique('plots', 'plot_no')->where('special_economic_zone_id', $this->plot->special_economic_zone_id)],
            'new_plots.*.plot_size'=>'required|integer|not_in:0|max:'.$this->plot->plot_size.'|digits_between:1,20',
            'new_plots.*.latitude'=>'sometimes|nullable',
            'new_plots.*.longitude'=>'sometimes|nullable',
        ];
    }

    public function messages()
    {
        return [
            'new_plots.*.plot_no.unique' => 'This plot no. is already exist.',
            'new_plots.*.plot_no.distinct' => 'This plot no. has a duplicate value.',
            'new_plots.*.plot_size.max' => 'The plot size must not be greater than previous plot size.',
        ];
    }
}
