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
            $table->string('lrn')->unique();
            $table->string('password');
            $table->string('lastname');
             $table->string('firstname');
            $table->string('middlename');
            $table->enum('sex', ['male', 'female']);
            $table->foreignId('strand_id')->constrained()->cascadeOnDelete();
            $table->enum('grade_level', ['11', '12']);
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->string('year_start');
            $table->string('year_end');
            $table->string('place_birth');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->foreignId('guardian_id')->constrained()->cascadeOnDelete();
            $table->string('house_address')->nullable();
            $table->string('street')->nullable();
            $table->string('brgy')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
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
