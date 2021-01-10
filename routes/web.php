<?php

use Illuminate\Support\Facades\Route;

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

// Pages available for all registered users
Route::get('/', function () {
    return view('/auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('/home');
})->name('home');

// Pages available for users with role Employee
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['employee']], function () {
        
        Route::get('/working-hours', function() {
            return view('/employee/working-hours');
        })->name('working-hours');

        Route::get('/expenses', function() {
            return view('/employee/expenses');
        })->name('expenses');

    });
});

// Pages available for users with role Manager
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['manager']], function () {
        
        Route::get('/projects', function() {
            return view('/manager/projects');
        })->name('projects');
        
        Route::get('/time-reports', function() {
            return view('/manager/time-reports');
        })->name('time-reports');

    });
});

// Pages available for users with role Admin
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['admin']], function () {
        
        Route::get('/users', function() {
            return view('/admin/users');
        })->name('users');

    });
});