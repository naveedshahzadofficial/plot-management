<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessStructure extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['structure_name', 'structure_remark', 'structure_status'];
}
