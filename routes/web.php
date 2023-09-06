<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

/*authentication*/
Route::group([], function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'submit'])->name('submit')->middleware('actch');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
/*authentication*/
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});