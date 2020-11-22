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

Route::get('/', function () {
    return view('/auth/login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/employee/working-hours', function () {
//     return view('employee/working-hours');
// })->name('working-hours');

Route::middleware(['auth:sanctum', 'verified'])->get('/employee/expense-report', function () {
    return view('employee/personal-expense-report');
})->name('personal-expense-report');

Route::middleware(['auth:sanctum', 'verified'])->get('/manager/time-report', function () {
    return view('manager/time-report');
})->name('time-report');

// Route::middleware(['auth:sanctum', 'verified'])->get('/manager/projects', function () {
//     return view('manager/projects');
// })->name('projects');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/all-users', function () {
    return view('admin/all-users');
})->name('all-users');

// Route::middleware(['auth:sanctum', 'verified'])->get('/admin/register', function () {
//     return view('admin/register');
// })->name('register');

Route::get('/employee', 'EmployeeController@index');

Route::get('/manager', 'ManagerController@index');

Route::get('/admin', 'AdminController@index');