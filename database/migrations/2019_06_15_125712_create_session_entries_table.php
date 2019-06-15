<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id');
            $table->bigInteger('word_id');
            $table->boolean('correct');
            $table->boolean('typo');
            $table->integer('time_taken');
            $table->string('answer');
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
        Schema::dropIfExists('session_entries');
    }
}
