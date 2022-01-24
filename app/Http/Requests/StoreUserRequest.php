<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'sometimes',
            'password' => 'required|same:password_confirmation',
            'role_id' => 'required',
            'special_economic_zone_id'=> [new RequiredIf(!in_array($this->role_id,[1,2,5]))]
        ];
    }
}
