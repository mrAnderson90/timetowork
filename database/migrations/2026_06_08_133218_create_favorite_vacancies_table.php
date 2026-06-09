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
        Schema::create('favorite_vacancies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vacancy_id');

            $table->timestamps();

            $table->index('user_id', 'favorite_vacancies_user_idx');
            $table->index('vacancy_id', 'favorite_vacancies_vacancy_idx');

            $table->foreign('user_id', 'favorite_vacancies_user_fk')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('vacancy_id', 'favorite_vacancies_vacancy_fk')
                ->references('id')
                ->on('vacancies')
                ->cascadeOnDelete();

            $table->unique(
                ['user_id', 'vacancy_id'],
                'favorite_vacancies_complex_uq'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_vacancies');
    }
};
