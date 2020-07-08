<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftPattern extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_pattern', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userID');
            $table->date('date');
            $table->time('mondayCI')->nullable();
            $table->time('mondayCO')->nullable();
            $table->time('tuesdayCI')->nullable();
            $table->time('tuesdayCO')->nullable();
            $table->time('wednesdayCI')->nullable();
            $table->time('wednesdayCO')->nullable();
            $table->time('thursdayCI')->nullable();
            $table->time('thursdayCO')->nullable();
            $table->time('fridayCI')->nullable();
            $table->time('fridayCO')->nullable();
            $table->time('saturdayCI')->nullable();
            $table->time('saturdayCO')->nullable();
            $table->time('sundayCI')->nullable();
            $table->time('sundayCO')->nullable();
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
        Schema::dropIfExists('shift_pattern');
    }
}
