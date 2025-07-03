<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->nullable();
            $table->longText('attribute')->nullable();
            $table->longText('filter')->nullable();
            $table->longText('front')->nullable();
            $table->longText('combined_price')->nullable();
            $table->longText('sort_order')->nullable();
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
        Schema::dropIfExists('map_groups');
    }
}
