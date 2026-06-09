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
        Schema::create('vacancy_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamps();

            $table->index('vacancy_id', 'vacancy_tags_vacancy_idx');
            $table->index('tag_id', 'vacancy_tags_tag_idx');

            $table->foreign('vacancy_id', 'vacancy_tags_vacancy_fk')
                ->references('id')
                ->on('vacancies')
                ->cascadeOnDelete();

            $table->foreign('tag_id', 'vacancy_tags_tag_fk')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete();

            $table->unique(
                ['vacancy_id', 'tag_id'],
                'vacancy_tags_complex_uq'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_tags');
    }
};
