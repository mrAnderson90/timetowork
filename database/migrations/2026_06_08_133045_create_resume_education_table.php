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
        Schema::create('resume_educations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resume_id');
            $table->string('institution');
            $table->string('faculty')->nullable();
            $table->string('specialization')->nullable();
            $table->unsignedBigInteger('degree_id');
            $table->date('date_from');
            $table->date('date_to')->nullable();

            $table->timestamps();

            $table->index('resume_id', 'resume_education_resume_idx');
            $table->index('degree_id', 'resume_education_degree_idx');

            $table->foreign('resume_id', 'resume_education_resume_fk')
                ->references('id')
                ->on('resumes')
                ->cascadeOnDelete();

            $table->foreign('degree_id', 'resume_education_degree_fk')
                ->references('id')
                ->on('education_degrees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_educations');
    }
};
