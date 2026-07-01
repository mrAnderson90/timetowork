<?php

namespace App\Http\Controllers;

// TODO: Настроить логику установки атрибута published_at

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

class VacancyController extends Controller
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Публичный список вакансий
     */
    public function index()
    {
        $vacancies = Vacancy::query()
            ->with(['company', 'category'])
            ->latest()
            ->paginate(10);

        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Публичная карточка вакансии
     */
    public function show(Vacancy $vacancy)
    {
        $vacancy->load([
            'company',
            'category',
            'employmentType',
            'experienceLevel',
            'skills',
            'tags',
        ]);

        if (
            auth()->check() &&
            auth()->user()->isEmployer() &&
            $vacancy->company->user_id === auth()->id()
        ) {
            $vacancy->load([
                'applications',
                'applications.resume',
                'applications.status',
            ]);
        }

        $hasApplied = auth()->check()
            && auth()->user()->isApplicant()
            && $vacancy->hasApplicationFrom(auth()->user());

        return view('vacancies.show', compact('vacancy', 'hasApplied'));
    }

    /**
     * Кабинет работодателя
     */
    public function employerIndex()
    {
        $vacancies = Vacancy::query()
            ->whereHas('company', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->with(['company', 'category'])
            ->latest()
            ->paginate(10);

        return view('vacancies.my', compact('vacancies'));
    }

    public function create()
    {
        $this->authorize('create', Vacancy::class);

        $categories = VacancyCategory::all();
        $companies = auth()->user()->companies;
        $employmentTypes = EmploymentType::all();
        $experienceLevels = ExperienceLevel::all();
        $vacancyStatuses = VacancyStatus::all();
        $skills = Skill::all();
        $tags = Tag::all();

        return view('vacancies.create', compact(
            'categories',
            'companies',
            'employmentTypes',
            'experienceLevels',
            'vacancyStatuses',
            'skills',
            'tags'
        ));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Vacancy::class);

        $this->service->store(
            $request->validated()
        );

        return redirect()
            ->route('employer.vacancies.index')
            ->with('success', 'Вакансия успешно создана');
    }

    public function edit(Vacancy $vacancy)
    {
        abort_if($vacancy->company->user_id !== auth()->id(), 403);

        $vacancy->load([
            'company',
            'category',
            'employmentType',
            'experienceLevel',
            'skills',
            'tags',
        ]);

        $categories = VacancyCategory::all();
        $companies = auth()->user()->companies;
        $employmentTypes = EmploymentType::all();
        $experienceLevels = ExperienceLevel::all();
        $vacancyStatuses = VacancyStatus::all();
        $skills = Skill::all();
        $tags = Tag::all();

        return view('vacancies.edit', compact(
            'categories',
            'companies',
            'employmentTypes',
            'experienceLevels',
            'vacancyStatuses',
            'skills',
            'tags',
            'vacancy'
        ));
    }

    public function update(UpdateRequest $request, Vacancy $vacancy)
    {
        abort_if($vacancy->company->user_id !== auth()->id(), 403);

        $this->service->update(
            $vacancy,
            $request->validated()
        );

        return redirect()
            ->route('employer.vacancies.index')
            ->with('success', 'Вакансия успешно обновлена');
    }

    public function destroy(Vacancy $vacancy)
    {
        abort_if($vacancy->company->user_id !== auth()->id(), 403);

        $vacancy->delete();

        return redirect()
            ->route('employer.vacancies.index')
            ->with('success', 'Вакансия успешно удалена');
    }
}
