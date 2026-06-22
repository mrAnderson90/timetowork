<?php

namespace App\Services\ResumeEducation;

use App\Models\Resume;
use App\Models\ResumeEducation;

class Service
{
    public function store(Resume $resume, array $data): void
    {
        $data['resume_id'] = $resume->id;

        ResumeEducation::create($data);
    }

    public function update(ResumeEducation $education, array $data): void
    {
        $education->update($data);
    }
}
