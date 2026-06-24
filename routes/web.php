<?php

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});

Route::resource('vacancies', VacancyController::class);
Route::resource('resumes', ResumeController::class);

// ResumeExperiences
Route::prefix('resumes/{resume}')
    ->name('resume-experiences.')
    ->group(function () {

        Route::get(
            '/experiences/create',
            [\App\Http\Controllers\ResumeExperienceController::class, 'create']
        )->name('create');

        Route::post(
            '/experiences',
            [\App\Http\Controllers\ResumeExperienceController::class, 'store']
        )->name('store');

    });

Route::prefix('resume-experiences')
    ->name('resume-experiences.')
    ->group(function () {

        Route::get(
            '/{experience}/edit',
            [\App\Http\Controllers\ResumeExperienceController::class, 'edit']
        )->name('edit');

        Route::patch(
            '/{experience}',
            [\App\Http\Controllers\ResumeExperienceController::class, 'update']
        )->name('update');

        Route::delete(
            '/{experience}',
            [\App\Http\Controllers\ResumeExperienceController::class, 'destroy']
        )->name('destroy');
    });

// ResumeEducations
Route::prefix('resumes/{resume}')
    ->name('resume-educations.')
    ->group(function () {

        Route::get(
            '/educations/create',
            [\App\Http\Controllers\ResumeEducationController::class, 'create']
        )->name('create');

        Route::post(
            '/educations',
            [\App\Http\Controllers\ResumeEducationController::class, 'store']
        )->name('store');

    });

Route::prefix('resume-educations')
    ->name('resume-educations.')
    ->group(function () {

        Route::get(
            '/{education}/edit',
            [\App\Http\Controllers\ResumeEducationController::class, 'edit']
        )->name('edit');

        Route::patch(
            '/{education}',
            [\App\Http\Controllers\ResumeEducationController::class, 'update']
        )->name('update');

        Route::delete(
            '/{education}',
            [\App\Http\Controllers\ResumeEducationController::class, 'destroy']
        )->name('destroy');
    });

// ResumePhoto
Route::prefix('resumes/{resume}')
    ->name('resume-photos.')
    ->group(function () {

        Route::get(
            '/photos/create',
            [\App\Http\Controllers\ResumePhotoController::class, 'create']
        )->name('create');

        Route::post(
            '/photos',
            [\App\Http\Controllers\ResumePhotoController::class, 'store']
        )->name('store');

    });

Route::prefix('resume-photos')
    ->name('resume-photos.')
    ->group(function () {

//        Route::get(
//            '/{photo}/edit',
//            [\App\Http\Controllers\ResumePhotoController::class, 'edit']
//        )->name('edit');

        Route::patch(
            '/{photo}',
            [\App\Http\Controllers\ResumePhotoController::class, 'update']
        )->name('update');

        Route::delete(
            '/{photo}',
            [\App\Http\Controllers\ResumePhotoController::class, 'destroy']
        )->name('destroy');
    });
