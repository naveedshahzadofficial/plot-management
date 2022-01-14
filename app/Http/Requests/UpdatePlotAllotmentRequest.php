<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlotAllotmentRequest extends FormRequest
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
        $rules = [
            'special_economic_zone_id'=> 'required',
            'owner_question_id'=> 'required',
            'full_name'=> 'required',
            'cnic_no'=> 'required',
            'mobile_no'=> 'required',
            'email_address'=> 'sometimes|nullable',
            'phone_no'=> 'sometimes|nullable',
            'remark'=> 'sometimes|nullable',
            'status'=> 'required',
        ];
        if($this->owner_question_id==1){
            $rules =  array_merge($rules,[
                'business_name' => 'required',
                'business_structure_id' => 'required',
                'business_ntn' => 'required',
                'business_address' => 'required',
                'province_id' => 'required',
                'district_id' => 'required',
                'tehsil_id' => 'required',
                'business_phone_no' => 'required',
                'business_fax_no' => 'sometimes|nullable',
                'website_url' => 'sometimes|nullable',
                'business_email_address' => 'sometimes|nullable',
                'fax_no' => 'sometimes|nullable',
            ]);

            if($this->business_structure_id==2){
                $rules =  array_merge($rules,['business_registration_no' => 'required',]);
            }

            if(in_array($this->business_structure_id, [3,4,5])){
                $rules =  array_merge($rules,[
                    'secp_company_incorporation_no' => 'required',
                    'company_incorporation_date' => 'required',
                    'company_structure' => 'required',
                ]);
            }

        }else if($this->owner_question_id==2){
            $rules =  array_merge($rules,[
                'addresses.*.address' => 'required',
                'addresses.*.province_id' => 'required',
                'addresses.*.district_id' => 'required',
                'addresses.*.tehsil_id' => 'required',
            ]);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'owner_question_id'=> 'please select your choice.',
            'mobile_no'=> 'Mobile No. is required.',
            'cnic_no'=> 'CNIC No. is required.',
            'addresses.*.address'=> 'Address is required.',
            'addresses.*.province_id'=> 'Province is required.',
            'addresses.*.district_id'=> 'District is required.',
            'addresses.*.tehsil_id'=> 'City/ Tehsil is required.',
            'business_structure_id'=> 'Business Structure is required.',
            'province_id'=> 'Province is required.',
            'district_id'=> 'District is required.',
            'tehsil_id'=> 'Tehsil is required.',
            'business_phone_no'=> 'Landline Phone No. is required.',
            'business_ntn'=> 'National Tax Number (Business) is required.',
            'business_registration_no'=> 'Business Registration No. is required.',
            'secp_company_incorporation_no'=> 'SECP Company Incorporation No. is required.',
            'company_incorporation_date'=> 'Company Incorporation Date is required.',
            'company_structure'=> 'Company Structure is required.',
        ];
    }
}
