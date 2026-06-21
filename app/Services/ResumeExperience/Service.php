<?php

namespace App\Services\ResumeExperience;

use App\Models\Resume;
use App\Models\ResumeExperience;

class Service
{
    public function store(Resume $resume, array $data): void
    {
        $data['resume_id'] = $resume->id;

        ResumeExperience::create($data);
    }

    public function update(ResumeExperience $experience, array $data): void
    {
        $experience->update($data);
    }
}
