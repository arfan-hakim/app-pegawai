<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;

Route::resource('employees', EmployeeController::class);
Route::resource('departements', DepartementController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::put('/attendances/{id}/status', [AttendanceController::class, 'updateStatus'])->name('attendances.updateStatus');
Route::post('/attendances/{id}/checkin', [AttendanceController::class, 'checkIn'])->name('attendances.checkIn');
Route::post('/attendances/{id}/checkout', [AttendanceController::class, 'checkOut'])->name('attendances.checkOut');
Route::post('/attendances/reset', [AttendanceController::class, 'reset'])->name('attendances.reset');
Route::resource('salaries', SalaryController::class);
Route::post('/salaries/reset', [SalaryController::class, 'reset'])->name('salaries.reset');
?>