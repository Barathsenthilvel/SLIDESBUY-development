<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute_name')->unique()->nullable();
            $table->string('attribute_type')->nullable();
            $table->string('data_type')->nullable();
            $table->longText('attribute_values')->nullable();
            $table->longText('attribute_units')->nullable();
            $table->longText('attribute_icons')->nullable();
            $table->longText('attribute_sort')->nullable();
            $table->string('units_display')->nullable();
            $table->string('icons_display')->nullable();
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
        Schema::dropIfExists('attributes');
    }
}
