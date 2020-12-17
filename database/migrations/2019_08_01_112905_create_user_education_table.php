<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->smallInteger('degree_id');
            $table->unsignedInteger('program_study_id')->nullable();
            $table->char('city_id', '4')->nullable();
            $table->string('school_name');
            $table->float('gpa')->nullable();
            $table->year('graduation');
            $table->year('entry');
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
        Schema::dropIfExists('user_education');
    }
}
