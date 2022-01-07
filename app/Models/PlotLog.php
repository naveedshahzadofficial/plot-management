<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotLog extends Model
{
    use HasFactory;
    protected $fillable = ['plot_id', 'new_plot_id', 'plot_action'];
}
