<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

// Pages available for all employees
Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('/home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/working-hours', function () {
    return view('/employee/working-hours');
})->name('working-hours');

Route::middleware(['auth:sanctum', 'verified'])->get('/personal-expense-report', function () {
    return view('/employee/personal-expense-report');
})->name('personal-expense-report');


// Employee pages
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/working-hours', [WorkingHoursController::class, 'indexWorkingHours'])->name('working-hours');
// });


// Admin exclusive pages
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/users', [AdminController::class, 'indexUsers'])->name('users');
    });
});

// Manager exclusive pages
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['manager']], function () {
        Route::get('/projects', [ManagerController::class, 'indexProjects'])->name('projects');
        Route::get('/time-reports', [ManagerController::class, 'indexTimeReport'])->name('time-reports');
    });
});