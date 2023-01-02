<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

Route::any('login', [LoginController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
});




