<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
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
}
