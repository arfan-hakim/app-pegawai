<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PositionController;

Route::resource('employees', EmployeeController::class);
Route::resource('departements', DepartementController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('positions', PositionController::class);

?>