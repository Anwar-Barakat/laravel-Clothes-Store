<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->string('name');
            $table->string('code');
            $table->string('color');
            $table->float('price');
            $table->float('discount');
            $table->float('gst');
            $table->float('weight');
            $table->string('video')->nullable();
            $table->text('description');
            $table->string('wash_care');
            $table->string('fabric');
            $table->string('pattern');
            $table->string('sleeve');
            $table->string('fit');
            $table->string('occasion');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('meta_keywords');
            $table->enum('is_feature', ['No', 'Yes']);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}