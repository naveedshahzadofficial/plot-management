<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tehsil extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'tehsil_name_e','tehsil_name_u','district_id','province_id','fbr_code_id','tehsil_remark','tehsil_status'];
}
