<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthorController;
use App\Http\Livewire\Authors;

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
        Route::post('/change-profile-picture', [AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'backend.pages.settings')->name('settings');
        Route::post('/change-blog-logo', [AuthorController::class, 'changeBlogLogo'])->name('change-blog-logo');
        Route::post('/change-blog-icon', [AuthorController::class, 'changeBlogIcon'])->name('change-blog-icon');
        Route::view('/authors', 'backend.pages.authors')->name('authors');
        Route::post('/authors', [Authors::class, 'addAuthor'])->name('authors.add');
    });
});

