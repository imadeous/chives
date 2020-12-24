<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayslipController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class);
Route::resource('/payslips', PayslipController::class);

Route::put('/users/{user}/fire', [UserController::class, 'fire'])->name('fire');
Route::get('/users/{user}/payslips', [UserController::class, 'payslips'])->name('payslips');
