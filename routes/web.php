<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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


/*authentication*/
Route::group([], function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'submit'])->name('submit')->middleware('actch');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
/*authentication*/

Route::group(['middleware' => ['admin']], function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('/rooms', RoomController::class);
    Route::get('/rooms/availability/{id}/{availability}', [RoomController::class, 'availability'])->name('rooms.availability');
    
    Route::resource('/customers', CustomerController::class);

    Route::resource('/bookings', BookingController::class);

    Route::resource('/reservations', ReservationController::class);
});