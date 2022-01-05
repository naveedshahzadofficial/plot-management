<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSezRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sez_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('special_economic_zone_id')->nullable()->constrained();
            $table->string('rate_per_acre')->nullable();
            $table->date('date_of_approval')->nullable();
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
        Schema::dropIfExists('sez_rates');
    }
}
