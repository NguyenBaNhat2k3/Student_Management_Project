<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
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

Route::get('/', function () {
    return view('layout');
});

Route::resource('/home',HomeController::class);

Route::resource('students',StudentController::class);
Route::resource('teachers',TeacherController::class);
Route::resource('courses',CourseController::class);
Route::resource('enrollments',EnrollmentController::class);
Route::resource('payments',PaymentController::class);

Route::get('report/report1/{id}', [ReportController::class,'report1']);

Route::post('admin_login',[LoginController::class,'login'])->name('admin_login');
Route::get('showloginform',[LoginController::class,'showloginform'])->name('login_form');
Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login_google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('logout',[GoogleController::class,'googleLogout'])->name('logout');