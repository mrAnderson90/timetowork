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

        abort_if(
            !auth()->user()->companies()->whereKey($data['company_id'])->exists(),
            403
        );

        $vacancy = Vacancy::create($data);
        $vacancy->tags()->sync($tags);
        $vacancy->skills()->sync($skills);
    }

    public function update(Vacancy $vacancy, array $data): void
    {
        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        abort_if(
            !auth()->user()->companies()->whereKey($data['company_id'])->exists(),
            403
        );

        $vacancy->update($data);
        $vacancy->tags()->sync($tags);
        $vacancy->skills()->sync($skills);
    }
}
