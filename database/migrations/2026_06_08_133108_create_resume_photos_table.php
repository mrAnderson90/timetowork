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
        Schema::create('resume_photos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resume_id');
            $table->string('path');
            $table->boolean('is_main')->default(0);

            $table->timestamps();

            $table->index('resume_id', 'resume_photos_resume_idx');

            $table->foreign('resume_id', 'resume_photos_resume_fk')
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
        Schema::dropIfExists('resume_photos');
    }
};
