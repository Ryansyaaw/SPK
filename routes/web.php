<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\criteria_controller;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.login');
// });
Route::prefix('/')->group (function () {
    // Route::get('/', function () {
    //     return view('dashboard.home');
    // })->name('dashboard.home');

    // Route::get('/criteria', function () {
    //     return view('dashboard.criteria');
    // })->name('dashboard.criteria');
    Route::resource('criteria', criteria_controller::class);
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('perhitungan', PerhitunganController::class);
    // Route::get('/register', [AuthController::class, 'register'])->name('register.form');
    // Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/', [AuthController::class, 'login'])->name('login.form');
    Route::post('/', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/dashboard',[HomeController::class, 'index'])->name('home.index');
    // Route::get('/alternatif', function () {
    //     return view('dashboard.alternatif');
    // })->name('dashboard.alternatif');
    
    // Route::group(['middleware' => 'auth'], function () {
    //     Route::get('/home', [HomeController::class, 'index']);
    //     Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    // });
});
