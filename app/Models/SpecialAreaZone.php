<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialAreaZone extends Model
{
    use HasFactory;

    protected $fillable = ['name','district_id','area','latitude','longitude','status'];

    public function district(){
        return $this->belongsTo('App\Models\District','district_id','id');
    }
}
