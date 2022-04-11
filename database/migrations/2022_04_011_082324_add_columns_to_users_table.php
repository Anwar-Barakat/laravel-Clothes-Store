<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->after('name');
            $table->string('address')->after('status');
            $table->string('city')->after('address');
            $table->string('state')->after('city');
            $table->foreignId('country_id')->after('state');
            $table->string('pincode')->after('country_id');
            $table->string('mobile')->after('pincode');
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
            $table->dropColumn('status')->default('0');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('country_id');
            $table->dropColumn('pincode');
            $table->dropColumn('mobile');
        });
    }
}