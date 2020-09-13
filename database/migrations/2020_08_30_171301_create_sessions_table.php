<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Who made the exercise
            $table->unsignedBigInteger('exercise_id'); // Which exercise made
            $table->date('date');
            $table->unsignedTinyInteger('sets');
            $table->unsignedTinyInteger('reps');
            $table->unsignedTinyInteger('level')->nullable();
            $table->unsignedTinyInteger('weight')->nullable();
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
        Schema::dropIfExists('sessions');
    }
}
