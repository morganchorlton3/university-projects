<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectedEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projected_earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userID');
            $table->double('weeklyPay');
            $table->double('monthlyPay');
            $table->double('yearlyPay');
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
        //
    }
}
