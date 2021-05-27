<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
           // subject name, description, code, credit value, teacher name for each subject
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('teacher_name');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('student_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taken_subjects');
    }
}
