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

Route::middleware(['auth:sanctum', 'verified'])->get('/projects', function () {
    return view('projects');
})->name('projects');

Route::middleware(['auth:sanctum', 'verified'])->get('/working-hours', function () {
    return view('working-hours');
})->name('working-hours');

Route::middleware(['auth:sanctum', 'verified'])->get('/expense-report', function () {
    return view('personal-expense-report');
})->name('personal-expense-report');

Route::middleware(['auth:sanctum', 'verified'])->get('/time-report', function () {
    return view('time-report');
})->name('time-report');

Route::middleware(['auth:sanctum', 'verified'])->get('/all-users', function () {
    return view('all-users');
})->name('all-users');

Route::middleware(['auth:sanctum', 'verified'])->get('/auth/register', function () {
    return view('auth/register');
})->name('register');