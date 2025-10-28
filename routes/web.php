<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
Use App\Http\Controllers\CareerController;
Use App\Http\Controllers\TeacherController;



Route::get('/', [FacultyController::class, 'index']);

Route::resource('faculty', FacultyController::class);
Route::resource('career', CareerController::class);
Route::resource('teacher', TeacherController::class);
