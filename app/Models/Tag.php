<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = [];

    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(
            Vacancy::class,
            'vacancy_sills',
            'skill_id',
            'vacancy_id'
        );
    }
}
