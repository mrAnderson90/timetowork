<?php

namespace App\Http\Controllers;
// TODO: Настроить логику установки атрибута published_at
use App\Http\Controllers\Controller;
use App\Models\EmploymentType;
use App\Models\ExperienceLevel;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Vacancy;
use App\Models\VacancyCategory;
use App\Models\VacancyStatus;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
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

    public function store()
    {
        $data = request()->validate([
            'title' => [ 'required', 'string', 'max:255' ],
            'vacancy_category_id' => [ 'required', 'integer' ],
            'description' => [ 'nullable', 'string' ],
            'salary_from' => [ 'nullable', 'integer' ],
            'salary_to' => [ 'nullable', 'integer' ],
            'city' => [ 'nullable', 'string', 'max:255' ],
            'employment_type_id' => [ 'required', 'integer' ],
            'experience_level_id' => [ 'required', 'integer' ],
            'vacancy_status_id' => [ 'required', 'integer' ],
            'tags' => [ 'nullable', 'array' ],
            'tags.*' => [ 'integer' ],
//            'tags.*' => ['exists:tags,id'],
            'skills' => [ 'nullable', 'array' ],
            'skills.*' => [ 'integer' ],
//            'skills.*' => ['exists:skills,id'],
        ]);

        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['company_id'] = 1;

//        dd($data);

        $vacancy = Vacancy::create($data);
        $vacancy->tags()->attach($tags);
        $vacancy->skills()->attach($skills);

        return redirect()->route('vacancies.index');
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

    public function update(Vacancy $vacancy)
    {
        $data = request()->validate([
            'title' => [ 'required', 'string', 'max:255' ],
            'vacancy_category_id' => [ 'required', 'integer' ],
            'description' => [ 'nullable', 'string' ],
            'salary_from' => [ 'nullable', 'integer' ],
            'salary_to' => [ 'nullable', 'integer' ],
            'city' => [ 'nullable', 'string', 'max:255' ],
            'employment_type_id' => [ 'required', 'integer' ],
            'experience_level_id' => [ 'required', 'integer' ],
            'vacancy_status_id' => [ 'required', 'integer' ],
            'tags' => [ 'nullable', 'array' ],
//            'tags.*' => [ 'integer' ],
            'tags.*' => ['integer', 'exists:tags,id'],
            'skills' => [ 'nullable', 'array' ],
//            'skills.*' => [ 'integer' ],
            'skills.*' => ['integer', 'exists:skills,id'],
        ]);

        $tags = $data['tags'] ?? [];
        $skills = $data['skills'] ?? [];

        unset($data['tags'], $data['skills']);

        $data['company_id'] = 1;


        $vacancy->update($data);
        $vacancy->tags()->sync($tags);
        $vacancy->skills()->sync($skills);

        return redirect()->route('vacancies.index');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index');
    }
}
