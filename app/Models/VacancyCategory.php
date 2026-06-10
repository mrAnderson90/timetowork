<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VacancyCategory extends Model
{
    protected $table = 'vacancy_categories';
    protected $guarded = [];

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'vacancy_category_id', 'id');
    }
}
