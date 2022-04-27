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
            $table->float('zero_500g')->after('country_id');
            $table->float('_501_1000g')->after('zero_500g');
            $table->float('_1001_2000g')->after('_501_1000g');
            $table->float('_2001_5000g')->after('_1001_2000g');
            $table->float('above_5000g')->after('_2001_5000g');
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
            $table->dropColumn('zero_500g');
            $table->dropColumn('_501_1000g');
            $table->dropColumn('_1001_2000g');
            $table->dropColumn('_2001_5000g');
            $table->dropColumn('above_5000g');
        });
    }
}
