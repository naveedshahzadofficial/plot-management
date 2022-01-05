<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Attribute;

class SezRate extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['special_economic_zone_id', 'rate_per_acre', 'date_of_approval', 'status'];

    protected $casts = [
        'date_of_approval' => 'date:d-m-Y'
    ];

    public function setDateOfApprovalAttribute($value)
    {
        $this->attributes['date_of_approval'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getDateOfApprovalAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    function specialEconomicZone(): BelongsTo
    {
        return $this->belongsTo(SpecialEconomicZone::class);
    }
}
