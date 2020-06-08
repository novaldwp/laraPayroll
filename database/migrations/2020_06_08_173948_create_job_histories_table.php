<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start');
            $table->date('end');
            $table->string('company_name');
            $table->longText('address');
            $table->string('reason');
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('jobstatus_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('designation_id')->unsigned();
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
        Schema::dropIfExists('job_history');
    }
}
