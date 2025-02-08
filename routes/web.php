<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('mainForm.index');
});


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', action: [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/responses', [AdminController::class, 'responses'])->name('responses');
        Route::get('/viewResponse/{id}', [AdminController::class, 'viewResponse'])->name('viewResponse');

        // Route for approving response
        Route::get('/admin/response/approve/{id}', [AdminController::class, 'approveResponse'])->name('admin.approveResponse');

        Route::get('/editForm', [AdminController::class, 'editForm'])->name('editForm');
        Route::get('/viewForm/{id}', [AdminController::class, 'viewForm'])->name('viewForm');

        Route::get('/admin/forms/{id}/edit', [FormController::class, 'edit'])->name('admin.forms.edit');
        Route::post('/admin/forms/{id}/update', [FormController::class, 'update'])->name('admin.forms.update');

        Route::get('/shared', action: [AdminController::class, 'shared'])->name('shared');
        Route::get('/sharedRespone/{id}', action: [AdminController::class, 'sharedRespone'])->name('sharedRespone');

        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings/change-password', [AdminController::class, 'updatePassword'])->name('change.password');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    });

});

require __DIR__ . '/auth.php';
