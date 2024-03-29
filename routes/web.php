<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//doctor
Route::get('/doctor-list', [DoctorController::class,'viewList']);
Route::get('/doctor-add', [DoctorController::class,'add']);
Route::post('/doctor-add', [DoctorController::class,'submit']);
Route::get ('/doctorupdate/{id}', [DoctorController::class,'update']);
Route::get('/doctor-delete/{id}', [DoctorController::class,'delete']);

//appointment
Route::get('/appointment', [AppointmentController::class,'view']);
Route::get('/appointment-list', [AppointmentController::class,'viewList']);
Route::post('/appointment-add', [AppointmentController::class,'submit']);
Route::get('/appointment-delete/{id}', [AppointmentController::class,'delete']);
Route::get('/appointment-approve/{id}', [AppointmentController::class,'approve']);
Route::get('/appointment-reject/{id}', [AppointmentController::class,'reject']);