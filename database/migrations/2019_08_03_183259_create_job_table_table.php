<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_table', static function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('education_id');
            $table->unsignedInteger('experience_id');
            $table->unsignedInteger('program_study_id');
            $table->string('name');
            $table->string('function');
            $table->text('description');
            $table->integer('minimum_age');
            $table->integer('maximum_age');
            $table->date('open');
            $table->date('close');
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('jobs');
    }
}
