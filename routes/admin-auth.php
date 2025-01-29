<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\userManagement\UserManagementController;
use Illuminate\Support\Facades\Route;

// Admin Guest Routes (Unauthenticated)
Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    // Login Routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Admin Authenticated Routes
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes
    Route::get('/user', [UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user', [UserManagementController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserManagementController::class, 'edit'])->name('user.edit');  // Fix here
    Route::match(['put', 'patch'], '/user/{user}', [UserManagementController::class, 'update'])->name('user.update');// Fix here
    Route::delete('/user/{user}', [UserManagementController::class, 'destroy'])->name('user.destroy'); // Fix here

    // Manage User Route
    Route::get('/user/manageUser', [UserManagementController::class, 'manageUser'])->name('user.manageUser');
    
    // Logout Route
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
