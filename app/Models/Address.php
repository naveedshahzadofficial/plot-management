<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['plot_allotment_id', 'address', 'province_id', 'district_id', 'tehsil_id'];

    function plotAllotment(): BelongsTo
    {
        return $this->belongsTo(PlotAllotment::class);
    }
}
