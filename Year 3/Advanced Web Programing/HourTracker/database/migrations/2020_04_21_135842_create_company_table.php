<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('ownerUID');
            $table->integer('employees');
            $table->longText('reason');
            $table->integer('breakFrequency')->nullable();
            $table->date('lastPayDate')->nullable();
            $table->integer('payFrequency')->nullable();
            $table->date('nextPayDate')->nullable();
            $table->integer('sundayPay')->nullable();
            $table->integer('status')->default('1');
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
