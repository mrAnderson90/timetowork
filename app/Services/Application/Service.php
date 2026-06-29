<?php

namespace App\Services\Application;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Vacancy;

class Service
{
    public function store(Vacancy $vacancy, array $data): void
    {
        $data['vacancy_id'] = $vacancy->id;

        $data['application_status_id'] = ApplicationStatus::query()
            ->where('name', 'Новый')
            ->value('id');

        Application::create($data);
    }

    public function update(Application $application, array $data): void
    {
        $application->update($data);
    }
}
