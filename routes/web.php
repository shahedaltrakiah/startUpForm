<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\AdminController;

Route::get('/', function () { 
    return view('mainForm.index');  
});


Route::post('/startup', [StartupController::class, 'store'])->name('startup.store');

Route::get('/login', action: [AdminController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/responses', [AdminController::class,'responses'])->name('responses');

Route::get('/shared', [AdminController::class,'shared'])->name('shared');

Route::get('/settings', [AdminController::class,' settings'])->name('settings');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', action: [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });

});
