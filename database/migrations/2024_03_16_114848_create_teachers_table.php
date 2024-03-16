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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->enum('sex', ['male', 'female']);
            $table->enum('status', ['single', 'married', 'widowed']);
            $table->string('birth_place');
            $table->date('date_birth');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('house_number')->nullable();
             $table->string('street')->nullable();
             $table->string('brgy')->nullable();
             $table->string('city')->nullable();
             $table->string('state')->nullable();
              $table->string('zip_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

