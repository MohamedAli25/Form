<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 256);
            $table->string('last_name', 256);
            $table->string('email', 256);
            $table->string('phone_number', 256);
            $table->string('university', 256);
            $table->string('faculty', 256);
            $table->string('department', 256);
            $table->string('academic_year', 256);
            $table->unsignedInteger('first_preference_id');
            $table->unsignedInteger('second_preference_id');
            $table->unsignedInteger('available_number_id');
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
        Schema::dropIfExists('applicants');
    }
}
