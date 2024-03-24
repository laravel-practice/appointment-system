<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');

Route::group(['middleware' => 'checkUserRole'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/appointment', [AdminDashboardController::class,'appointment'])->name('admin.appointment');
        Route::get('/appointment/data', [AdminDashboardController::class,'appointmentData'])->name('admin.appointment.data');
        Route::get('/appointment/load-data', [AdminDashboardController::class,'appointmentLoadData'])->name('admin.appointment.load-data');
        Route::get('/user', [AdminDashboardController::class,'user'])->name('admin.user');
        Route::get('/user/data', [AdminDashboardController::class,'userData'])->name('admin.user.data');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/dashboard', [DashboardController::class,'index'])->name('user.dashboard');
    });
});
