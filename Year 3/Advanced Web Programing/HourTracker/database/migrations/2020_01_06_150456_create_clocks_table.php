<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userID');
            $table->Time('in');
            $table->Time('out')->nullable();
            $table->boolean('active');
            $table->double('hoursWorked');
            $table->double('shiftPay');
            $table->date('shiftDate');
            $table->integer('shiftType');
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
        Schema::dropIfExists('clocks');
    }
}
