<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotAllocation extends Model
{
    use HasFactory;
    protected $fillable = ['special_economic_zone_id', 'plot_allotment_id', 'allotment_id', 'plot_id', 'rate_per_acre', 'rate_additional_corner', 'rate_additional_main_road', ];
}
