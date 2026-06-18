<?php

namespace App\Services\Vacancy;

use App\Models\Vacancy;

class Service
{
    public function store(array $data): void
    {
        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['company_id'] = 1;
        $vacancy = Vacancy::create($data);
        $vacancy->tags()->attach($tags);
        $vacancy->skills()->attach($skills);
    }

    public function update(Vacancy $vacancy, array $data): void
    {
        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['company_id'] = 1;


        $vacancy->update($data);
        $vacancy->tags()->sync($tags);
        $vacancy->skills()->sync($skills);
    }
}
