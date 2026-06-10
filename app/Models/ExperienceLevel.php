<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExperienceLevel extends Model
{
    protected $table = 'experience_levels';
    protected $guarded = [];

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'experience_level_id', 'id');
    }
}
