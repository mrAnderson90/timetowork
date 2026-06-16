<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $guarded = [];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VacancyCategory::class, 'vacancy_category_id', 'id');
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class, 'employment_type_id', 'id');
    }

    public function experienceLevel(): BelongsTo
    {
        return $this->belongsTo(ExperienceLevel::class, 'experience_level_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(VacancyStatus::class, 'vacancy_status_id', 'id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'vacancy_id', 'id');
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'vacancy_skills',
            'vacancy_id',
            'skill_id'
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'vacancy_tags',
            'vacancy_id',
            'tag_id'
        );
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'favorite_vacancies',
            'vacancy_id',
            'user_id'
        );
    }
}
