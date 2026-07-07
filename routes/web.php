<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeEducationController;
use App\Http\Controllers\ResumeExperienceController;
use App\Http\Controllers\ResumePhotoController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Главная
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/main');

Route::get('/main', [MainController::class, 'index'])
    ->name('main.index');

/*
|--------------------------------------------------------------------------
| Публичные маршруты
|--------------------------------------------------------------------------
*/

Route::resource('vacancies', VacancyController::class)
    ->only(['index', 'show']);

/*
|--------------------------------------------------------------------------
| Соискатель
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'applicant'])->group(function () {

    Route::resource('resumes', ResumeController::class);

    Route::prefix('resumes/{resume}')
        ->name('resume-experiences.')
        ->group(function () {

            Route::get('/experiences/create', [ResumeExperienceController::class, 'create'])->name('create');
            Route::post('/experiences', [ResumeExperienceController::class, 'store'])->name('store');

        });

    Route::prefix('resume-experiences')
        ->name('resume-experiences.')
        ->group(function () {

            Route::get('/{experience}/edit', [ResumeExperienceController::class, 'edit'])->name('edit');
            Route::patch('/{experience}', [ResumeExperienceController::class, 'update'])->name('update');
            Route::delete('/{experience}', [ResumeExperienceController::class, 'destroy'])->name('destroy');

        });

    Route::prefix('resumes/{resume}')
        ->name('resume-educations.')
        ->group(function () {

            Route::get('/educations/create', [ResumeEducationController::class, 'create'])->name('create');
            Route::post('/educations', [ResumeEducationController::class, 'store'])->name('store');

        });

    Route::prefix('resume-educations')
        ->name('resume-educations.')
        ->group(function () {

            Route::get('/{education}/edit', [ResumeEducationController::class, 'edit'])->name('edit');
            Route::patch('/{education}', [ResumeEducationController::class, 'update'])->name('update');
            Route::delete('/{education}', [ResumeEducationController::class, 'destroy'])->name('destroy');

        });

    Route::prefix('resumes/{resume}')
        ->name('resume-photos.')
        ->group(function () {

            Route::get('/photos/create', [ResumePhotoController::class, 'create'])->name('create');
            Route::post('/photos', [ResumePhotoController::class, 'store'])->name('store');

        });

    Route::prefix('resume-photos')
        ->name('resume-photos.')
        ->group(function () {

            Route::patch('/{photo}', [ResumePhotoController::class, 'update'])->name('update');
            Route::delete('/{photo}', [ResumePhotoController::class, 'destroy'])->name('destroy');

        });

    Route::prefix('vacancies/{vacancy}')
        ->name('applications.')
        ->group(function () {
            Route::get('/applications/create', [ApplicationController::class, 'create'])->name('create');
            Route::post('/applications', [ApplicationController::class, 'store'])->name('store');

        });

    Route::prefix('applications')
        ->name('applications.')
        ->group(function () {

//            Route::get('/{application}/edit', [ApplicationController::class, 'edit'])->name('edit');
//            Route::patch('/{application}', [ApplicationController::class, 'update'])->name('update');
            Route::delete('/{application}', [ApplicationController::class, 'destroy'])->name('destroy');

        });

});

/*
|--------------------------------------------------------------------------
| Работодатель
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'employer'])
    ->scopeBindings()
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Компании
        |--------------------------------------------------------------------------
        */

        Route::resource('companies', CompanyController::class);

        /*
        |--------------------------------------------------------------------------
        | Вакансии
        |--------------------------------------------------------------------------
        */

        Route::prefix('vacancies')
            ->name('vacancies.')
            ->group(function () {

                Route::get('/', [VacancyController::class, 'employerIndex'])
                    ->name('index');

                Route::get('/create', [VacancyController::class, 'create'])
                    ->name('create');

                Route::post('/', [VacancyController::class, 'store'])
                    ->name('store');

                Route::get('/{vacancy}/edit', [VacancyController::class, 'edit'])
                    ->name('edit');

                Route::patch('/{vacancy}', [VacancyController::class, 'update'])
                    ->name('update');

                Route::delete('/{vacancy}', [VacancyController::class, 'destroy'])
                    ->name('destroy');

                /*
                |--------------------------------------------------------------------------
                | Отклики
                |--------------------------------------------------------------------------
                */

                Route::prefix('{vacancy}/applications')
                    ->name('applications.')
                    ->group(function () {

                        Route::get('/', [ApplicationController::class, 'index'])
                            ->name('index');

                        Route::get('/{application}/edit', [ApplicationController::class, 'edit'])
                            ->name('edit');

                        Route::patch('/{application}', [ApplicationController::class, 'update'])
                            ->name('update');

                    });

            });
    });

/*
|--------------------------------------------------------------------------
| Профиль
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';
