<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmploymentType;
use App\Models\ExperienceLevel;
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

        return view('vacancies.create', compact([
            'categories',
            'employmentTypes',
            'experienceLevels',
            'vacancyStatuses',
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
        ]);

        $data['company_id'] = 1;

        Vacancy::create($data);

        return redirect()->route('vacancies.index');
    }
}
