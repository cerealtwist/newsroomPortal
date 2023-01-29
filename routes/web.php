<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthorController;

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

Route::prefix('admin')->name('admin.')->group(function(){});

Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'backend.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'backend.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class, 'ResetForm'])->name('reset-form');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile', 'backend.pages.profile')->name('profile');
    });
});

