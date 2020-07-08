<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jobTitle');
            $table->string('company');
            $table->date('payDate');
            $table->integer('payFrequency');
            $table->date('nextPayDate');
            $table->Integer('userID');
            $table->double('hourlyPay');
            $table->double('sundayPay');
            $table->double('breakFrequency')->nullable();
            $table->double('breakLength')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
