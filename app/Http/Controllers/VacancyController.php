<?php

namespace App\Http\Controllers;
// TODO: Настроить логику установки атрибута published_at
use App\Http\Controllers\Controller;
use App\Http\Requests\Vacancy\StoreRequest;
use App\Http\Requests\Vacancy\UpdateRequest;
use App\Models\EmploymentType;
use App\Models\ExperienceLevel;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Vacancy;
use App\Models\VacancyCategory;
use App\Models\VacancyStatus;
use App\Services\Vacancy\Service;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $vacancies = Vacancy::query()
            ->with(['company', 'category'])
            ->latest()
            ->paginate(10);

        return view('vacancies.index', compact('vacancies'));
    }

    public function show(Vacancy $vacancy)
    {
        $vacancy->load([
            'company',
            'category',
            'employmentType',
            'experienceLevel',
            'skills',
            'tags',
            'applications',
            'applications.resume',
            'applications.status',
        ]);

        return view('vacancies.show', compact('vacancy'));
    }

    public function create()
    {
        $categories = VacancyCategory::all();
        $employmentTypes = EmploymentType::all();
        $experienceLevels = ExperienceLevel::all();
        $vacancyStatuses = VacancyStatus::all();
        $skills = Skill::all();
        $tags = Tag::all();

        return view('vacancies.create', compact([
            'categories',
            'employmentTypes',
            'experienceLevels',
            'vacancyStatuses',
            'skills',
            'tags',
        ]));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()
            ->route('vacancies.index')
            ->with('success', 'Вакансия успешно создана');
    }

    public function edit(Vacancy $vacancy)
    {
        $vacancy->load([
            'company',
            'category',
            'employmentType',
            'experienceLevel',
            'skills',
            'tags',
        ]);

        $categories = VacancyCategory::all();
        $employmentTypes = EmploymentType::all();
        $experienceLevels = ExperienceLevel::all();
        $vacancyStatuses = VacancyStatus::all();
        $skills = Skill::all();
        $tags = Tag::all();

        return view('vacancies.edit', compact([
            'categories',
            'employmentTypes',
            'experienceLevels',
            'vacancyStatuses',
            'tags',
            'skills',
            'vacancy',
        ]));
    }

    public function update(UpdateRequest $request, Vacancy $vacancy)
    {
        $data = $request->validated();
        $this->service->update($vacancy, $data);

        return redirect()
            ->route('vacancies.index')
            ->with('success', 'Вакансия успешно обновлена');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()
            ->route('vacancies.index')
            ->with('success', 'Вакансия успешно удалена');
    }
}
