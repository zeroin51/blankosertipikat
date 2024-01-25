<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pengajuan', [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan');
Route::get('/pengajuan/create', [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.store');

