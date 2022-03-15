<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('special_economic_zone_id')->nullable()->constrained();
            $table->foreignId('plot_allotment_id')->nullable()->constrained();
            $table->foreignId('allotment_id')->nullable()->constrained();
            $table->foreignId('plot_id')->nullable()->constrained();
            $table->decimal('rate_per_acre',20,0,true)->default(0)->nullable();
            $table->decimal('rate_additional_corner',20,0,true)->default(0)->nullable();
            $table->decimal('rate_additional_main_road',20,0,true)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plot_allocations');
    }
}
