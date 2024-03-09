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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\BlankoController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('users', UsersController::class);

Route::get('users', [UsersController::class, 'index'])->name('users.index');
Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');

Route::resource('tim', TimController::class);

Route::get('tim', [TimController::class, 'index'])->name('tim.index');
Route::get('tim/create', [TimController::class, 'create'])->name('tim.create');
Route::get('tim/{tim}/edit', [TimController::class, 'edit'])->name('tim.edit');

Route::resource('ketersediaan', KetersediaanController::class);
Route::get('/ketersediaan', [KetersediaanController::class, 'index'])->name('ketersediaan.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin'); // Rename the method to 'admin'

Route::resource('pengajuan', PengajuanController::class);

Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/data', [PengajuanController::class, 'data'])->name('pengajuan.data');
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::put('/pengajuan/change-status/{kodePengajuan}', [PengajuanController::class, 'changeStatus'])->name('pengajuan.change-status');
Route::get('/pengajuan/detail/{kodePengajuan}', [PengajuanController::class, 'detail'])->name('pengajuan.detail');

Route::get('/blanko/data', [BlankoController::class, 'data'])->name('blanko.data');
Route::get('/blanko', [BlankoController::class, 'index'])->name('blanko.index');