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
        Schema::create('resume_skills', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resume_id');
            $table->unsignedBigInteger('skill_id');

            $table->timestamps();

            $table->index('resume_id', 'resume_skills_resume_idx');
            $table->index('skill_id', 'resume_skills_skill_idx');

            $table->foreign('resume_id', 'resume_skills_resume_fk')
                ->references('id')
                ->on('resumes')
                ->cascadeOnDelete();

            $table->foreign('skill_id', 'resume_skills_skill_fk')
                ->references('id')
                ->on('skills')
                ->cascadeOnDelete();

            $table->unique(
                ['resume_id', 'skill_id'],
                'resume_skills_complex_uq'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_skills');
    }
};
