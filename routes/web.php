<?php

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});

Route::resource('vacancies', VacancyController::class);
Route::resource('resumes', ResumeController::class);

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
