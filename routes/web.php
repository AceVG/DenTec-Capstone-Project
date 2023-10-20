<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
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
    return view('public.homepage');
});

Route::get('/about', function () {
    return view('public.about');
});

Route::get('/services', function () {
    return view('public.services');
});

Route::get('/contact', function () {
    return view('public.contact');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/appointment', [AppointmentController::class, 'view']);
    Route::post('/appointment', [AppointmentController::class, 'create']);
    Route::post('/appointment/update', [AppointmentController::class, 'update']);
    
    Route::post('/dentist', [DentistController::class, 'create']);
    Route::post('/dentist/update', [DentistController::class, 'update']);
    Route::post('/dentist/delete', [DentistController::class, 'delete']);
    
    Route::post('/service', [ServiceController::class, 'create']);
    Route::post('/service/update', [ServiceController::class, 'update']);
    Route::post('/service/delete', [ServiceController::class, 'delete']);

    Route::get('/admin', [AdminController::class, 'appointments_view']);
    Route::get('/admin/appointments', [AdminController::class, 'appointments_view']);
    Route::get('/admin/dentists', [AdminController::class, 'dentists_view']);
    Route::get('/admin/services', [AdminController::class, 'services_view']);
    Route::get('/admin/messages', [AdminController::class, 'messages_view']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
