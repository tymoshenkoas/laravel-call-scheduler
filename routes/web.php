<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ArchiveController;

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

Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('schedules/list', [ScheduleController::class, 'getList'])->name('schedules.list');
Route::get('schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');

Route::get('archives', [ArchiveController::class, 'index'])->name('archives.index');
Route::get('archives/list', [ArchiveController::class, 'getList'])->name('archives.list');
