<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lrn');
            $table->string('lastname');
            $table->string('middlename');
            $table->enum('sex', ['male', 'female']);
            $table->unsignedBigInteger('strand_id'); // Add strand_id column
            $table->foreign('strand_id')->references('id')->on('strands')->onDelete('cascade');
            $table->enum('grade_level', ['11', '12']);
            $table->unsignedBigInteger('section_id'); // Add section_id column
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade'); // Correct reference to the sections table
            $table->string('school_year');
            $table->string('place_birth');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('house_address');
            $table->string('street');
            $table->string('brgy');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
