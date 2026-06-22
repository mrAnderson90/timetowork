<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resume\StoreRequest;
use App\Http\Requests\Resume\UpdateRequest;
use App\Models\EmploymentType;
use App\Models\Resume;
use App\Models\ResumeVisibility;
use App\Models\Skill;
use App\Services\Resume\Service;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::query()
            ->with(['employmentType', 'visibility'])
            ->latest()
            ->paginate(10);

        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employmentTypes = EmploymentType::all();
        $visibilities = ResumeVisibility::all();
        $skills = Skill::all();

        return view('resumes.create', compact(
            'employmentTypes',
            'visibilities',
            'skills'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()
            ->route('resumes.index')
            ->with('success', 'Резюме успешно создано');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        $resume->load([
            'employmentType',
            'visibility',
            'experiences',
            'skills',
        ]);

        return view('resumes.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        $resume->load('skills');

        $employmentTypes = EmploymentType::all();
        $visibilities = ResumeVisibility::all();
        $skills = Skill::all();

        return view('resumes.edit', compact(
            'resume',
            'employmentTypes',
            'visibilities',
            'skills'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Resume $resume)
    {
        $data = $request->validated();

        $this->service->update($resume, $data);

        return redirect()
            ->route('resumes.index')
            ->with('success', 'Резюме успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();

        return redirect()
            ->route('resumes.index')
            ->with('success', 'Резюме успешно удалено');
    }
}
