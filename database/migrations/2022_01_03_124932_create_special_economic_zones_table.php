<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialEconomicZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_economic_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('total_area')->nullable();
            $table->string('industrial_area')->nullable();
            $table->string('industrial_total_plots')->nullable();
            $table->string('commercial_area')->nullable();
            $table->string('commercial_total_plots')->nullable();
            $table->string('infrastructure_area')->nullable();
            $table->string('parks_area')->nullable();
            $table->string('amenities_area')->nullable();
            $table->string('other_area')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('special_economic_zones');
    }
}
