<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPlan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['special_economic_zone_id', 'master_plan_file', 'year', 'status'];
}
