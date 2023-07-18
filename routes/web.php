<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
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

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/add', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/add', [StudentController::class, 'store'])->name('student.store');



// Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
// Route::get('/courses/add', [CourseController::class, 'create'])->name('course.create');
// Route::post('/courses/add', [CourseController::class, 'store'])->name('course.store');
// Route::put('/courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');

Route::resource('courses', CourseController::class)->except([
    'show',
    'destroy',
]);
