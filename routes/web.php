<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function(){
    return view('backend.dashboard.index');
})->name('dashboard')->middleware('role:admin');

Route::get('/login', [AuthController::class, 'login_view'])->name('login.index');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register_view'])->name('register.index');
Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
