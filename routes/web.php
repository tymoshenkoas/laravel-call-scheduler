<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.list');
Route::get('schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');
