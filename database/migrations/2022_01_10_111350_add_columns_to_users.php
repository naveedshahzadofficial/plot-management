<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->string('mobile_no')->nullable()->after('username');
            $table->string('profile_file')->nullable()->after('mobile_no');
            $table->foreignId('special_economic_zone_id')->nullable()->after('profile_file')->constrained();
            $table->boolean('user_status')->default(1)->after('remember_token');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('special_economic_zone_id');
            $table->dropColumn(['username','mobile_no','profile_file','user_status']);
        });
    }
}
