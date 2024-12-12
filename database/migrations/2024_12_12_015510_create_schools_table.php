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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('academic_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('teachers',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->timestamps();


        });

        Schema::create('subjects', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // Relación con asignaturas
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Relación con profesores
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('subject_teacher');
    }
};
