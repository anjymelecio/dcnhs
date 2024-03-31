<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id');
            $table->string('password');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->enum('rank', ['Teacher I', 'Teacher II', 'Teacher III', 'Master Teacher I', 'Master Teacher II', 'Master Teacher III', 'Master Teacher IV']);
            $table->enum('sex', ['Male', 'Female']);
            $table->string('birth_place');
            $table->date('date_birth');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('street')->nullable();
            $table->string('brgy')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
