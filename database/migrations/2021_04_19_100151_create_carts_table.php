<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('cust_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('prod_id')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('price')->nullable();
            $table->string('delivery_price')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('tax')->nullable();
            $table->string('ordered_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('shipping_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
