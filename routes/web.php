<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('area.index');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Rutas del Cliente (Áreas, Centros, Equipos, Profesores)
|--------------------------------------------------------------------------
*/

// ÁREAS
Route::get('area/list', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
Route::get('area/{id}', [AreaController::class, 'show'])->name('area.show');
Route::get('area/{id}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('area/{id}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{id}', [AreaController::class, 'destroy'])->name('area.destroy');
Route::post('area/store', [AreaController::class, 'store'])->name('area.store');

// CENTROS DE FORMACIÓN
Route::get('training_center/list', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('training_center/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::get('training_center/{id}', [TrainingCenterController::class, 'show'])->name('training_center.show');
Route::get('training_center/{id}/edit', [TrainingCenterController::class, 'edit'])->name('training_center.edit');
Route::put('training_center/{id}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('training_center/{id}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');
Route::post('training_center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');

// EQUIPOS DE CÓMPUTO
Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('computer/{id}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// INSTRUCTORES / PROFESORES
Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');

// CURSOS
Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::post('course/store', [CourseController::class, 'store'])->name('course.store');

// APRENDICES
Route::get('apprentice/list', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::get('apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::get('apprentice/{id}/edit', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{id}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{id}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');
Route::post('apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');