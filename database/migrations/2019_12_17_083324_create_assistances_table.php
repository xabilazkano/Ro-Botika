<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('patient_id');
          $table->foreign('patient_id')->references('id')->on('patients');
          $table->unsignedBigInteger('nurse_id');
          $table->foreign('nurse_id')->references('id')->on('users');
          $table->unsignedBigInteger('medicine_id');
          $table->foreign('medicine_id')->references('id')->on('medicines');
          $table->date('estimated_date');
          $table->date('firm_date');
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
        Schema::dropIfExists('assistances');
    }
}
