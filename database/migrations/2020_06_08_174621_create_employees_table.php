<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            //personal detail
            $table->integer('nik')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('bop');
            $table->date('bod');
            $table->string('nationality');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('bloodtype_id')->unsigned();
            $table->bigInteger('religion_id')->unsigned();
            $table->bigInteger('marital_id')->unsigned();
            $table->bigInteger('taxes_id')->unsigned();

            //contact information
            $table->string('phone');
            $table->string('email');
            $table->longText('address');

            //employee affair
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('designation_id')->unsigned();
            $table->bigInteger('jobstatus_id')->unsigned();
            $table->string('salary');
            $table->date('join_date');
            $table->date('leave_date')->nullable();

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
        Schema::dropIfExists('employee');
    }
}
