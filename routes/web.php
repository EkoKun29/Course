<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\VueController;
use App\Http\Controllers\PHPController;
use App\Http\Controllers\JSController;
use App\Http\Controllers\HTMLController;

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
    return view('auth.login');
})->name('login');


Auth::routes();

Route::get('/log-in', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('_login');
Route::post('/log-in-post', [App\Http\Controllers\Auth\LoginController::class, 'posts'])->name('_postlogin');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('_register');
Route::post('/input-register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('_postRegister');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('_logout');

//---------------harga----------------------------------------------------
Route::get('harga-course/{id}/delete', [App\Http\Controllers\HargaController::class, 'delete'])->name('harga.delete');
Route::resource('harga-course', HargaController::class);


//----------------course user ------------------------
Route::get('courses/{id}/delete', [App\Http\Controllers\CoursController::class, 'delete'])->name('course.delete');
Route::resource('courses', CoursController::class);

//----------------course vue ------------------------
Route::resource('courses-vue', VueController::class);

//----------------course php ------------------------
Route::resource('courses-php', PHPController::class);

//----------------course js ------------------------
Route::resource('courses-js', JSController::class);

//----------------course html ------------------------
Route::resource('courses-html', HTMLController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
