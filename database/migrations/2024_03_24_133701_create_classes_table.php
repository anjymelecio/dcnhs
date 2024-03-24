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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
            $table->string('subject');
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->enum('day', ['Monday', 'Wednesday', 'Tuesday', 'Thursday', 'Friday']);
            $table->time('time_start');
            $table->time('time_end');
            $table->foreignId('strand_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
