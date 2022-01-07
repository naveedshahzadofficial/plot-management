<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['special_economic_zone_id', 'plot_no', 'plot_type', 'plot_size', 'latitude', 'longitude', 'plot_status', 'status', 'plot_action', 'deleted_at'];

    function specialEconomicZone(): BelongsTo
    {
        return $this->belongsTo(SpecialEconomicZone::class);
    }
}
