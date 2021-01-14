<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('comments')->nullable();

            $table->dateTimeTz('start');
            $table->dateTimeTz('end');
            $table->unsignedBigInteger('creator_id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->boolean('first_time')->default(0);

            $table->boolean('oximeter')->default(0);
            $table->boolean('thermometer')->default(0);
            $table->boolean('baumanometer')->default(0);
            $table->boolean('glucometer')->default(0);

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('service')->default(0);

            $table->date('date');
            $table->foreign('creator_id')->references('id')->on('users')->cascadeOnDelete();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('patient_id')->references('id')->on('patients')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}