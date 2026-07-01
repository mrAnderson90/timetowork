<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeEducation\StoreRequest;
use App\Http\Requests\ResumeEducation\UpdateRequest;
use App\Models\EducationDegree;
use App\Models\Resume;
use App\Models\ResumeEducation;
use App\Services\ResumeEducation\Service;

class ResumeEducationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Resume $resume)
    {
        $degrees = EducationDegree::all();

        return view(
            'resume-educations.create',
            compact('resume', 'degrees')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Resume $resume)
    {
        $data = $request->validated();
        $this->service->store($resume, $data);

        return redirect()
            ->route('resumes.show', $resume)
            ->with('success', 'Образование добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResumeEducation $education)
    {
        $degrees = EducationDegree::all();

        return view(
            'resume-educations.edit',
            compact('education', 'degrees')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ResumeEducation $education)
    {
        $data = $request->validated();
        $this->service->update($education, $data);

        return redirect()
            ->route('resumes.show', $education->resume)
            ->with('success', 'Образование обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumeEducation $education)
    {
        $resume = $education->resume;

        $education->delete();

        return redirect()
            ->route('resumes.show', $resume)
            ->with(
                'success',
                'Образование удалено'
            );
    }
}
