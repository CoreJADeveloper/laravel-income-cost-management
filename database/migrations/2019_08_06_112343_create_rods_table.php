<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rods', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('ms_rod');
          $table->integer('total_amount');
          $table->integer('rate');
          $table->integer('price');
          $table->string('brand');
          $table->string('due_no')->nullable();
          $table->integer('customer_id');
          $table->string('customer_name');
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
        Schema::dropIfExists('rods');
    }
}
