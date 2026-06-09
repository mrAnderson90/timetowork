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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('resume_id');
            $table->text('cover_letter')->nullable();
            $table->unsignedBigInteger('application_status_id');

            $table->timestamps();

            $table->index('vacancy_id', 'applications_vacancy_idx');
            $table->index('resume_id', 'applications_resume_idx');
            $table->index('application_status_id', 'applications_application_status_idx');

            $table->foreign('vacancy_id', 'applications_vacancy_fk')
                ->references('id')
                ->on('vacancies')
                ->cascadeOnDelete();

            $table->foreign('resume_id', 'applications_resume_fk')
                ->references('id')
                ->on('resumes')
                ->cascadeOnDelete();

            $table->foreign('application_status_id', 'applications_application_status_fk')
                ->references('id')
                ->on('application_statuses');

            $table->unique(
                ['vacancy_id', 'resume_id'],
                'applications_vacancy_resume_uq',
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
