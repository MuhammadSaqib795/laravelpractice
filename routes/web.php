<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;


Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);

Route::resource('students', StudentController::class);