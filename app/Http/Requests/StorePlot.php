<?php

namespace App\Http\Requests;

//use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\PlotZoneValidate;

class StorePlot extends FormRequest
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
            'number' =>   ['required', new PlotZoneValidate($this->zone_id)],
            'zone_id' => 'required|integer',
            'area' => 'required|string|max:50',
            'latitide' => 'required|string|max:50',
            'longitude' => 'required|string|max:50',
            'status' => 'required|string',
        ];
    }
}
