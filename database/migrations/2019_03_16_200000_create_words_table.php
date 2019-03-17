<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source');
            $table->string('target');
            $table->bigInteger('level_id');
            $table->bigInteger('course_id');
            $table->jsonb('data');
            $table->timestamps();
        });

        Schema::table('words', function (Blueprint  $table) {
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
