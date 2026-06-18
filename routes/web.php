<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});

//Route::prefix('vacancies')
//    ->controller(VacancyController::class)
//    ->name('vacancy.')
//    ->group(function() {
//        Route::get('/', 'index')->name('index');
//        Route::get('/{vacancy}', 'show')->name('show');
//    });

Route::resource('vacancies', VacancyController::class);
