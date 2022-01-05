<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\PlotUpdateZoneValidate;

class UpdatePlot extends FormRequest
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
    public function rules(Request $request)
    {
       
       
        return [
            'number' =>   ['required', new PlotUpdateZoneValidate($this->zone_id,$this->plot)],
            //'number' =>  'required|unique:plots,number,' . $this->plot.',id',
            'zone_id' => 'required|integer',
            'area' => 'required|string|max:50',
            'latitide' => 'required|string|max:50',
            'longitude' => 'required|string|max:50',
            'status' => 'required|string',
        ];
    }
}
