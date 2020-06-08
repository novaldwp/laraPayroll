<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationJobHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_history', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('jobstatus_id')->references('id')->on('job_status')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_history', function (Blueprint $table) {
            //
        });
    }
}
