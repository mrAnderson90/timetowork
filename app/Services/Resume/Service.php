<?php

namespace App\Services\Resume;

use App\Models\Resume;

class Service
{
    public function store(array $data): void
    {
        $skills = $data['skills'] ?? [];

        unset($data['skills']);

        $data['user_id'] = auth()->id();

        $resume = Resume::create($data);

        $resume->skills()->attach($skills);
    }

    public function update(Resume $resume, array $data): void
    {
        $skills = $data['skills'] ?? [];

        unset($data['skills']);

        $resume->update($data);

        $resume->skills()->sync($skills);
    }
}
