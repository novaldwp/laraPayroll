<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('gender')->onDelete('cascade');
            $table->foreign('bloodtype_id')->references('id')->on('blood_type')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')->on('religion')->onDelete('cascade');
            $table->foreign('marital_id')->references('id')->on('marital')->onDelete('cascade');
            $table->foreign('taxes_id')->references('id')->on('taxes')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designation')->onDelete('cascade');
            $table->foreign('jobstatus_id')->references('id')->on('job_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee', function (Blueprint $table) {
            //
        });
    }
}
