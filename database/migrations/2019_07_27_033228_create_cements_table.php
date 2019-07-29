<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_amount');
            $table->integer('rate');
            $table->integer('price');
            $table->string('brand');
            $table->string('due_no');
            $table->integer('customer_id');
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
        Schema::dropIfExists('cements');
    }
}
