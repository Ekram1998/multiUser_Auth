<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllOfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

// registration
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration_post', [AuthController::class, 'registration_post']);
// Login
Route::get('login', [AuthController::class, 'login']);
Route::post('login_post', [AuthController::class, 'login_post']);
// forgot
Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('forgot_post', [AuthController::class, 'forgot_post']);
// reset password
Route::get('reset/{token}',[AuthController::class,'getReset']);
Route::post('reset_post/{token}',[AuthController::class,'postReset']);

// super Admin group
Route::group(['middleware' => 'superAdmin'], function () {
    Route::get('superadmin/dashboard', [SuperController::class, 'dashboard']);
    Route::get('superadmin/allinfo', [AllOfController::class, 'index']);
});

// Admin group
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
});

// User group
Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard']);
    Route::get('user/allinfo', [AllOfController::class, 'index']);
});

// Logout
Route::get('logout', [AuthController::class, 'logout']);
