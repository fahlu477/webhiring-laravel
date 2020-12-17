<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->char('birth_place_id', '4')->nullable();
            $table->smallInteger('religion_id')->nullable();
            $table->smallInteger('marital_status_id')->nullable();
            $table->string('picture')->nullable();
            $table->string('no_identity')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('phone')->nullable();
            $table->text('current_address')->nullable();
            $table->char('current_district_id', '8')->nullable();
            $table->text('current_zip_code')->nullable();
            $table->text('address')->nullable();
            $table->char('district_id', '8')->nullable();
            $table->char('zip_code', '5')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
