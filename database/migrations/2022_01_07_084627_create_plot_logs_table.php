<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->nullable()->constrained();
            $table->foreignId('new_plot_id')->nullable()->constrained('plots');
            $table->string('plot_action')->nullable();
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
        Schema::dropIfExists('plot_logs');
    }
}
