<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlotAllotment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['special_economic_zone_id', 'owner_question_id',
        'business_name', 'business_structure_id', 'company_incorporation_date',
        'secp_company_incorporation_no', 'business_registration_no', 'business_ntn', 'business_address',
        'province_id', 'district_id', 'tehsil_id', 'business_phone_no', 'business_fax_no', 'website_url', 'business_email_address', 'full_name',
        'cnic_no', 'mobile_no', 'email_address', 'phone_no', 'fax_no', 'person_status',
        'status'];
}
