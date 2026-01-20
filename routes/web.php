<?php

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

Route::get('/add-project', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::post('/add-project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
