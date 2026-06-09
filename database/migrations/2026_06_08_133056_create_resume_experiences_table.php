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
        Schema::create('resume_experiences', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resume_id');
            $table->string('company_name');
            $table->string('position');
            $table->text('description')->nullable();
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->boolean('is_current')->default(0);

            $table->timestamps();

            $table->index('resume_id', 'resume_experiences_resume_idx');

            $table->foreign('resume_id', 'resume_experiences_resume_fk')
                ->references('id')
                ->on('resumes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_experiences');
    }
};
