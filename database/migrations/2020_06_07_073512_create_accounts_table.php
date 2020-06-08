<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number_account');
            $table->string('branch');
            $table->enum('status', [1, 0]);
            $table->integer('bank_id')->unsigned();
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
