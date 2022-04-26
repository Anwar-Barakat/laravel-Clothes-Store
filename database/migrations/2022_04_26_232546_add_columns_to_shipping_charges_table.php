<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToShippingChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            $table->string('0_500')->after('country_id');
            $table->string('501_1000')->after('0_500');
            $table->string('1001_2000')->after('501_1000');
            $table->string('2001_5000')->after('1001_2000');
            $table->string('above_5000')->after('2001_5000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            $table->dropColumn('0_500');
            $table->dropColumn('501_1000');
            $table->dropColumn('1001_2000');
            $table->dropColumn('2001_5000');
            $table->dropColumn('above_5000');
        });
    }
}