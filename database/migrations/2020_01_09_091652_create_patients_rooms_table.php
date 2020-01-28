<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_id')->unsigned;
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->char('bed', 1)->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->date('up_date');
            $table->date('down_date')->nullable();
            $table->string('disease');
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
        Schema::dropIfExists('patients_rooms');
    }
}
