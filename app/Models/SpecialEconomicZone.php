<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialEconomicZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['district_id', 'name', 'total_area','industrial_area','industrial_total_plots','commercial_area','commercial_total_plots'
        ,'infrastructure_area','parks_area','amenities_area','other_area'
        ,'latitude','longitude','status' ];

    function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    function sezRates(): HasMany
    {
        return $this->hasMany(SezRate::class);
    }

    function masterPlans(): HasMany
    {
        return $this->hasMany(MasterPlan::class);
    }

    function industrialZones(): HasMany
    {
        return $this->hasMany(IndustrialZone::class);
    }


}
