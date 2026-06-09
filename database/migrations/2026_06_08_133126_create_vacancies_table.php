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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('vacancy_category_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('salary_from')->nullable();
            $table->unsignedInteger('salary_to')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('employment_type_id');
            $table->unsignedBigInteger('experience_level_id');
            $table->unsignedBigInteger('vacancy_status_id');
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index('company_id', 'vacancies_company_idx');
            $table->index('vacancy_category_id', 'vacancies_vacancy_category_idx');
            $table->index('employment_type_id', 'vacancies_employment_type_idx');
            $table->index('experience_level_id', 'vacancies_experience_level_idx');
            $table->index('vacancy_status_id', 'vacancies_vacancy_status_idx');

            $table->foreign('company_id', 'vacancies_company_fk')
                ->references('id')
                ->on('companies')
                ->cascadeOnDelete();

            $table->foreign('vacancy_category_id', 'vacancies_vacancy_category_id_fk')
                ->references('id')
                ->on('vacancy_categories');

            $table->foreign('employment_type_id', 'vacancies_employment_type_id_fk')
                ->references('id')
                ->on('employment_types');

            $table->foreign('experience_level_id', 'vacancies_experience_level_id_fk')
                ->references('id')
                ->on('experience_levels');

            $table->foreign('vacancy_status_id', 'vacancies_status_id_fk')
                ->references('id')
                ->on('vacancy_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
