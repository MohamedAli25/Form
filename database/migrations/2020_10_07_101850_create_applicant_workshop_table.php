<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_workshop', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('workshop_id');
            $table->foreign('workshop_id')
                ->references('id')->on('workshops')
                ->onDelete('cascade');
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')
                ->references('id')->on('applicants')
                ->onDelete('cascade');
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
        Schema::dropIfExists('applicant_workshop');
    }
}
