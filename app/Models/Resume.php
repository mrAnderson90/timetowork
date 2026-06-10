<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resume extends Model
{
    protected $table = 'resumes';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class, 'employment_type_id', 'id');
    }

    public function visibility(): BelongsTo
    {
        return $this->belongsTo(ResumeVisibility::class, 'resume_visibility_id', 'id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'resume_id', 'id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ResumePhoto::class, 'resume_id', 'id');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(ResumeExperience::class, 'resume_id', 'id');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(ResumeEducation::class, 'resume_id', 'id');
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'resume_skills',
            'resume_id',
            'skill_id'
        );
    }

    public function mainPhoto(): HasOne
    {
        return $this->hasOne(ResumePhoto::class, 'resume_id', 'id')
            ->where('is_main', 1);
    }
}
