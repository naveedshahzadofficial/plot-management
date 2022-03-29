<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allotment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['plot_allotment_id', 'allotment_date', 'reference_no', 'sector_id', 'remark', 'status'];

    protected $casts = [
        'allotment_date' => 'date:d-m-Y'
    ];

    public function setAllotmentDateAttribute($value)
    {
        $this->attributes['allotment_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getAllotmentDateAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    function plotAllocations(): HasMany
    {
        return $this->hasMany(PlotAllocation::class);
    }
}
