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
        Schema::create('written_works', function (Blueprint $table) {
           $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
            $table->enum('quarter', [1, 2, 3, 4]);
            $table->integer('s1')->default(0)->nullable();
            $table->integer('s2')->default(0)->nullable();
            $table->integer('s3')->default(0)->nullable();
            $table->integer('s4')->default(0)->nullable();
            $table->integer('s5')->default(0)->nullable();
            $table->integer('s6')->default(0)->nullable();
            $table->integer('s7')->default(0)->nullable();
            $table->integer('s8')->default(0)->nullable();
            $table->integer('s9')->default(0)->nullable();
            $table->integer('s10')->default(0)->nullable();
            $table->integer('h1')->default(0)->nullable();
            $table->integer('h2')->default(0)->nullable();
            $table->integer('h3')->default(0)->nullable();
            $table->integer('h4')->default(0)->nullable();
            $table->integer('h5')->default(0)->nullable();
            $table->integer('h6')->default(0)->nullable();
            $table->integer('h7')->default(0)->nullable();
            $table->integer('h8')->default(0)->nullable();
            $table->integer('h9')->default(0)->nullable();
            $table->integer('h10')->default(0)->nullable();
            $table->float('total_score')->default(0);
            $table->float('total_highest_score')->default(0);
            $table->float('ps');
            $table->float('ws');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('written_works');
    }
};
