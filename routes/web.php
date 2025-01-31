<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StartupController;
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
    return view('mainForm.index');
});

Route::post('/startup', [StartupController::class, 'store'])->name('startup.store');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', action: [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/responses', [AdminController::class, 'responses'])->name('responses');

        Route::get('/viewResponse', [AdminController::class, 'viewResponse'])->name('viewResponse');

        Route::get('/editForm', [AdminController::class,'editForm'])->name('editForm');

        Route::get('/sharedRespone', [AdminController::class,'sharedRespone'])->name('sharedRespone');

        Route::get('/settings', [AdminController::class,'settings'])->name('settings');
        
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    });

});

require __DIR__ . '/auth.php';
