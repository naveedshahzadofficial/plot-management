<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_allotments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('special_economic_zone_id')->nullable()->constrained();
            $table->foreignId('owner_question_id')->nullable()->constrained('questions');
            $table->string('business_name')->nullable();
            $table->foreignId('business_structure_id')->nullable()->constrained();
            $table->string('company_incorporation_date')->nullable();
            $table->string('secp_company_incorporation_no')->nullable();
            $table->string('business_registration_no')->nullable();
            $table->string('business_ntn')->nullable();
            $table->text('business_address')->nullable();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('tehsil_id')->nullable()->constrained();
            $table->string('business_phone_no')->nullable();
            $table->string('business_fax_no')->nullable();
            $table->string('website_url')->nullable();
            $table->string('business_email_address')->nullable();
            $table->string('full_name')->nullable();
            $table->string('cnic_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('person_status')->nullable();


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
        Schema::dropIfExists('plot_allotments');
    }
}
