<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class ProfileUpdateRequest extends FormRequest
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
        $user = User::find(auth()->user()->id);
        return [
            'name' => 'required|string|max:50',
            'mobile_no' => 'required|unique:users,mobile_no,'.$user->id,
            'cnic_no' => 'required|string|max:50',
        ];
    }
}
