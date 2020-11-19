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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


# testing navigation bar urls/routes
Route::middleware(['auth:sanctum', 'verified'])->get('/time-report', function () {
    return view('personal-time-report');
})->name('personal-time-report');

# testing navigation bar urls/routes
Route::middleware(['auth:sanctum', 'verified'])->get('/auth/register', function () {
    return view('auth/register');
})->name('register');