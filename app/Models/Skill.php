<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    protected $table = 'skills';

    protected $guarded = [];

    public function resumes(): BelongsToMany
    {
        return $this->belongsToMany(
            Resume::class,
            'resume_skills',
            'skill_id',
            'resume_id'
        );
    }

    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(
            Vacancy::class,
            'vacancy_skills',
            'skill_id',
            'vacancy_id'
        );
    }
}
