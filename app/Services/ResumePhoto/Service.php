<?php

namespace App\Services\ResumePhoto;

use App\Models\Resume;
use App\Models\ResumePhoto;

class Service
{
    public function store(Resume $resume, array $data): void
    {
        $isMain = $data['is_main'] ?? false;

        if (!$resume->photos()->exists()) {
            $isMain = true;
        }

        if ($isMain) {
            ResumePhoto::query()
                ->where('resume_id', $resume->id)
                ->update([
                    'is_main' => false
                ]);
        }

        $path = $data['image']->store(
            'resume-photos',
            'public'
        );

        ResumePhoto::create([
            'resume_id' => $resume->id,
            'path' => $path,
            'is_main' => $isMain,
        ]);
    }

    public function update(ResumePhoto $photo, array $data): void
    {
        if ($data['is_main']) {

            ResumePhoto::query()
                ->where('resume_id', $photo->resume_id)
                ->update([
                    'is_main' => false,
                ]);

            $photo->update([
                'is_main' => true,
            ]);
        }
    }
}
