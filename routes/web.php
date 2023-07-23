<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group([
    'middleware' => Chec
], function () {



    Route::get('/', [Controller::class, 'index'])->name('home');
    Route::resource('courses', CourseController::class)->except([
        'show',
    ]);

    Route::resource('students', StudentController::class)->except([
        'show',
    ]);

    Route::resource('teachers', TeacherController::class)->except([
        'show',
    ]);

    Route::resource('semesters', SemesterController::class)->except([
        'show',
    ]);
});
