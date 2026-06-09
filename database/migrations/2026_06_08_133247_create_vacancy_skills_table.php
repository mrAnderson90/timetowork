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
        Schema::create('vacancy_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('skill_id');

            $table->timestamps();

            $table->index('vacancy_id', 'vacancy_skills_vacancy_idx');
            $table->index('skill_id', 'vacancy_skills_skill_idx');

            $table->foreign('vacancy_id', 'vacancy_skills_vacancy_fk')
                ->references('id')
                ->on('vacancies')
                ->cascadeOnDelete();

            $table->foreign('skill_id', 'vacancy_skills_skill_fk')
                ->references('id')
                ->on('skills')
                ->cascadeOnDelete();

            $table->unique(
                ['vacancy_id', 'skill_id'],
                'vacancy_skills_complex_uq'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_skills');
    }
};
