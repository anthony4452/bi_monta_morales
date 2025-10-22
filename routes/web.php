<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;


Route::get('/', [FacultyController::class, 'index']);

Route::resource('faculty', FacultyController::class);