<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreRequest;
use App\Http\Requests\Application\UpdateRequest;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Services\Application\Service;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected Service $service;

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
    public function create(Vacancy $vacancy)
    {
        $resumes = Resume::query()
            ->where('user_id', auth()->id())
            ->get();

        return view(
            'applications.create',
            compact('vacancy', 'resumes')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Vacancy $vacancy)
    {
        $data = $request->validated();

        $this->service->store($vacancy, $data);

        return redirect()
            ->route('vacancies.show', $vacancy)
            ->with('success', 'Отклик успешно отправлен');
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
    public function edit(Application $application)
    {
        abort_if($application->vacancy->user_id !== auth()->id(), 403);

        $statuses = ApplicationStatus::all();

        return view(
            'applications.edit',
            compact('application', 'statuses')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Application $application)
    {
        abort_if($application->vacancy->user_id !== auth()->id(), 403);

        $data = $request->validated();

        $this->service->update($application, $data);

        return redirect()
            ->route('vacancies.show', $application->vacancy)
            ->with('success', 'Статус отклика обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $vacancy = $application->vacancy;

        $application->delete();

        return redirect()
            ->route('vacancies.show', $vacancy)
            ->with('success', 'Отклик удален');
    }
}
