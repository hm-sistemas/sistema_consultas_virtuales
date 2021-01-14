<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->string('last_name', 90);
            $table->string('name', 90);
            $table->string('full_name', 181)->index();

            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('city')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('occupation')->default(0);
            $table->string('state')->nullable();

            $table->string('country')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('birth_country')->nullable();

            $table->integer('zip_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->boolean('insured');

            $table->decimal('deductible', 13, 4)->default(-1);

            $table->date('birth_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}