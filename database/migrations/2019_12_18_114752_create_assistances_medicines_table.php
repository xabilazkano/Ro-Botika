<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistancesMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_medicine', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('assistance_id');
          $table->foreign('assistance_id')->references('id')->on('assistances');
          $table->unsignedBigInteger('medicine_id');
          $table->foreign('medicine_id')->references('id')->on('medicines');
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
        Schema::dropIfExists('assistances_medicines');
    }
}
