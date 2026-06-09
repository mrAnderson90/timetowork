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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('about')->nullable();
            $table->unsignedInteger('desired_salary')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('employment_type_id')->nullable();
            $table->unsignedBigInteger('resume_visibility_id');

            $table->timestamps();

            $table->index('user_id', 'resume_user_idx');
            $table->index('employment_type_id', 'resume_employment_type_idx');
            $table->index('resume_visibility_id', 'resume_resume_visibility_idx');

            $table->foreign('user_id', 'resume_user_fk')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('employment_type_id', 'resume_employment_type_fk')
                ->references('id')
                ->on('employment_types')
                ->nullOnDelete();

            $table->foreign('resume_visibility_id', 'resume_visibility_fk')
                ->references('id')
                ->on('resume_visibilities');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
