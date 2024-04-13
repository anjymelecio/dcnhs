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
        Schema::create('assesments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
            $table->enum('quarter', [1, 2, 3, 4]);
            $table->integer('h_score')->default(0)->nullable();
            $table->integer('score')->default(0)->nullable();
             $table->float('total_score')->default(0);
            $table->float('total_highest_score')->default(0);
            $table->float('ps');
            $table->float('ws');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assesments');
    }
};
