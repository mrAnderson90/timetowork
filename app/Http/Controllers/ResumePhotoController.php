<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumePhoto\StoreRequest;
use App\Http\Requests\ResumePhoto\UpdateRequest;
use App\Models\Resume;
use App\Models\ResumePhoto;
use App\Services\ResumePhoto\Service;
use Illuminate\Support\Facades\Storage;

class ResumePhotoController extends Controller
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Resume $resume)
    {
        return view('resume-photos.create', compact('resume'));
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
            ->with(
                'success',
                'Фотография успешно добавлена'
            );
    }

    public function update(UpdateRequest $request, ResumePhoto $photo)
    {
        $data = $request->validated();

        $this->service->update($photo, $data);

        return redirect()
            ->route('resumes.show', $photo->resume)
            ->with(
                'success',
                'Главная фотография обновлена'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumePhoto $photo)
    {
        $resume = $photo->resume;

        Storage::disk('public')
            ->delete($photo->path);

        $photo->delete();

        return redirect()
            ->route('resumes.show', $resume)
            ->with(
                'success',
                'Фотография удалена'
            );
    }
}
