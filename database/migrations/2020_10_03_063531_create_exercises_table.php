<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->decimal('calories_required_before_workout');
            $table->decimal('calories_required_after_workout');
            $table->string('exercise_start_time');
            $table->string('exercise_end_time');
            $table->json('hours')->nullable();
            $table->date('date');
            $table->string('period');
            $table->string('type');
            $table->integer('length');
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
        Schema::dropIfExists('exercises');
    }
}
