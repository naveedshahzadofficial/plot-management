<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMasterPlanRequest extends FormRequest
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
            'year'=>['required', Rule::unique('master_plans', 'year')->ignore($this->master_plan)->where('special_economic_zone_id', $this->special_economic_zone->id)],
            'master_plan_file'=>'required_without:old_master_plan_file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'status'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'year.unique' => 'This year master plan already exist.',
            'master_plan_file.required_without' => 'Master Plan file is required.',
            'master_plan_file.mimes' => 'Master Plan must be a file of type: jpg, jpeg, png, pdf, doc, docx.',
            'master_plan_file.max' => 'Master Plan file must not be greater than 5MB.',
        ];
    }
}
