<?php

namespace App\Services\Resume;

use App\Models\Resume;

class Service
{
    public function store(array $data): void
    {
        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['user'] = 1;
        $resume = Resume::create($data);
        $resume->tags()->attach($tags);
        $resume->skills()->attach($skills);
    }

    public function update(Resume $resume, array $data): void
    {
        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['user'] = 1;


        $resume->update($data);
        $resume->tags()->sync($tags);
        $resume->skills()->sync($skills);
    }
}
