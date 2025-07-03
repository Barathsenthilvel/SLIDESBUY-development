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
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_base_price')->nullable();
            $table->string('product_sku')->nullable();
            $table->longText('attribute_values')->nullable();
            $table->string('tax')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->longText('product_description')->nullable();
            $table->string('trending')->nullable();
            $table->string('delivery_date')->nullable();
            $table->longText('image1')->nullable();
            $table->longText('image2')->nullable();
            $table->longText('image3')->nullable();
            $table->longText('image4')->nullable();
            $table->longText('image5')->nullable();
            $table->string('similar_products')->nullable();
            $table->string('related_products')->nullable();
            $table->string('status')->default('1');
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
