<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|php
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::resources([
    "employees" => UserController::class,
    "category" => CategoryController::class,
    "product" => ProductController::class
]);

Route::controller(AccountController::class)->group(function()
{
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::prefix('accounts')->group(function()
    {
        Route::get("register", 'create')->name('accounts.create');
        Route::post("register", 'store')->name('accounts.store');
        Route::get("login", 'login')->name('login');
        Route::post("login", 'authenticate')->name('accounts.authenticate');
    });
});