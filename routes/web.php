<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\company_controller;
use App\Models\Record;

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
// Login, logout and registration
Route::get('/', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

// Receptionist
Route::get('/listcompany',[company_controller::class,'list'])->middleware('auth');
Route::get('/addcompany',[company_controller::class,'add'])->middleware('auth');
Route::post('/addcompany', [company_controller::class, 'store'])->middleware('auth');
Route::delete('/deletecompany/{id}', [company_controller::class, 'destroy'])->middleware('auth');
Route::post('/updateCompanyContent/{id}',[company_controller::class,'update'])->middleware('auth');

