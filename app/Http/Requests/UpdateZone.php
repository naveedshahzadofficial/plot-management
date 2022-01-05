<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZone extends FormRequest
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
            'name' =>  'required|unique:zones,name,' . $this->id.',id',
            'area_zone_id' => 'required|integer',
            'area' => 'required|string|max:50',
            'latitide' => 'required|string|max:50',
            'longitude' => 'required|string|max:50',
            'status' => 'required|string',
        ];
    }
}
