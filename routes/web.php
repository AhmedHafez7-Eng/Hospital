<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

//====================== Redirection Routes [HomeController]
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);

//====================== User Routes [HomeController]
Route::post('/appointment', [HomeController::class, 'createAppointment']);
Route::get('/my_appointment', [HomeController::class, 'my_appointment']);
Route::delete('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

//====================== Admin Routes [AdminController]
Route::get('/add_doctor', [AdminController::class, 'addDoctor']);
Route::post('/add_doctor', [AdminController::class, 'createDoctor']);








Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');