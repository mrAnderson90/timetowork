<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VacancyStatus extends Model
{
    protected $table = 'vacancy_statuses';
    protected $guarded = [];

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'vacancy_status_id', 'id');
    }
}
