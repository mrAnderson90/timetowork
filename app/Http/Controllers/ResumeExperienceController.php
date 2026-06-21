<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeExperience\StoreRequest;
use App\Http\Requests\ResumeExperience\UpdateRequest;
use App\Models\Resume;
use App\Models\ResumeExperience;
use App\Services\ResumeExperience\Service;
use Illuminate\Http\Request;

class ResumeExperienceController extends Controller
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
        return view('resume-experiences.create', compact('resume'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Resume $resume)
    {
        $data = $request->validated();

        $data['is_current'] = $request->boolean('is_current');

        $this->service->store($resume, $data);

        return redirect()
            ->route('resumes.show', $resume)
            ->with('success', 'Опыт работы добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResumeExperience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResumeExperience $experience)
    {
        return view(
            'resume-experiences.edit',
            compact('experience')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ResumeExperience $experience)
    {
        $data = $request->validated();

        $data['is_current'] = $request->boolean('is_current');

        $this->service->update($experience, $data);

        return redirect()
            ->route('resumes.show', $experience->resume)
            ->with(
                'success',
                'Опыт работы обновлен'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumeExperience $experience)
    {
        $resume = $experience->resume;

        $experience->delete();

        return redirect()
            ->route('resumes.show', $resume)
            ->with(
                'success',
                'Опыт работы удален'
            );
    }
}
