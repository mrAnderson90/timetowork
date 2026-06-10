<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmploymentType extends Model
{
    protected $table = 'employment_types';
    protected $guarded = [];

    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class, 'employment_type_id', 'id');
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'employment_type_id', 'id');
    }
}
