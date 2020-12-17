<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Relations User Profile
        Schema::table('user_profiles', static function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('birth_place_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('current_district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
        // Relations Role User
        Schema::table('role_user', static function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
        // Relations Job
        Schema::table('job_table', static function (Blueprint $table) {
            $table->foreign('program_study_id')->references('id')->on('program_studies')->onDelete('cascade');
        });
        // Relations User Education
        Schema::table('user_education', static function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
        // Relations User Work Experience
        Schema::table('user_work_experiences', static function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        // Relation Apply
        Schema::table('applies', static function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realation');
    }
}
