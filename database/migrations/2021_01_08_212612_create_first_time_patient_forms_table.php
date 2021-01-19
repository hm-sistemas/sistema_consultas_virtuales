<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTimePatientFormsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('first_time_patient_forms', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->dateTimeTz('arrival_time');
            $table->boolean('first_consult')->default(1);
            $table->boolean('first_visit')->default(1);
            $table->tinyInteger('children')->default(0);
            $table->tinyInteger('referral')->default(0);
            $table->string('referrer_name')->nullable();

            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone_number')->nullable();

            $table->string('insured_name')->nullable();
            $table->string('insured_ssn')->nullable();
            $table->tinyInteger('insured_relationship')->default(3);

            $table->string('insurer_name')->nullable();
            $table->string('insurer_phone_number')->nullable();

            $table->string('work_name')->nullable();
            $table->string('work_phone_number')->nullable();

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('first_time_patient_forms');
    }
}