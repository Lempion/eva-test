<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainFormController::class, 'index'])->name('mainPage');

Route::get('/requests_history', [\App\Http\Controllers\MainFormController::class, 'requestsMemory'])->name('requestsPage');

Route::post('/clear', [\App\Http\Controllers\MainFormController::class, 'clearData'])->name('clearData');

Route::post('/store', [\App\Http\Controllers\MainFormController::class, 'store'])->name('store');
