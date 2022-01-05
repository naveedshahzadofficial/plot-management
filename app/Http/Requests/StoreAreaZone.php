<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAreaZone extends FormRequest
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
            'name' =>   'required|string|max:50',
            'district_id' => 'required|integer',
            'area' => 'required|string|max:50',
            'latitide' => 'required|string|max:50',
            'longitude' => 'required|string|max:50',
            'status' => 'required|string',
        ];
    }
}
