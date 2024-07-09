<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BengkelController;
use App\Http\Controllers\Admin\SparepartController;

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

/* User Page */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/peta', [HomeController::class, 'peta'])->name('peta');

Route::get('/bengkel', [HomeController::class, 'bengkel'])->name('bengkel');
Route::get('/bengkel/{id}', [HomeController::class, 'detail_bengkel'])->name('detail-bengkel');

Route::get('/sparepart', [HomeController::class, 'sparepart'])->name('sparepart');
Route::get('/sparepart/{id}', [HomeController::class, 'sparepart_bengkel'])->name('sparepart-bengkel');

/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* Register */
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|owner'], 'as' => 'admin.'], function() {
    /* Admin Page */
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pemilik', [AdminController::class, 'pemilik'])->name('pemilik');
    Route::get('/create', [AdminController::class, 'create'])->name('user.create');
    Route::post('/store', [AdminController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    Route::get('/bengkel', [BengkelController::class, 'bengkel'])->name('bengkel');
    Route::get('/createbengkel', [BengkelController::class, 'create'])->name('bengkel.create');
    Route::post('/storebengkel', [BengkelController::class, 'store'])->name('bengkel.store');

    Route::get('/editbengkel/{id}', [BengkelController::class, 'edit'])->name('bengkel.edit');
    Route::put('/updatebengkel/{id}', [BengkelController::class, 'update'])->name('bengkel.update');
    Route::delete('/deletebengkel/{id}', [BengkelController::class, 'delete'])->name('bengkel.delete');

    Route::get('/sparepart', [SparepartController::class, 'sparepart'])->name('sparepart');
    Route::get('/createsparepart', [SparepartController::class, 'create'])->name('sparepart.create');
    Route::post('/storesparepart', [SparepartController::class, 'store'])->name('sparepart.store');

    Route::get('/editsparepart/{id}', [SparepartController::class, 'edit'])->name('sparepart.edit');
    Route::put('/updatesparepart/{id}', [SparepartController::class, 'update'])->name('sparepart.update');
    Route::delete('/deletesparepart/{id}', [SparepartController::class, 'delete'])->name('sparepart.delete');
});
