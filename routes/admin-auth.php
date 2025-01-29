<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Page\BlogAddController;
use App\Http\Controllers\Admin\Page\BlogSetupController;
use App\Http\Controllers\BlogCategoryController;
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

    // Blog Category Routes
    Route::prefix('/Pages')->name('Pages.')->group(function () {
        // Blog Category Routes
        Route::get('/blog-category', [BlogCategoryController::class, 'index'])->name('blog-category.index');
        Route::get('/blog-category/create', [BlogCategoryController::class, 'create'])->name('blog-category.create');
        Route::get('/blog-category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog-category.edit');
        Route::post('/blog-category/store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
        Route::put('/blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
        Route::delete('/blog-category/destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('blog-category.destroy');

        // Blog Add management
        Route::get('/blog-Add', [BlogAddController::class, 'index'])->name('blog-Add');
        Route::post('/blog-store', [BlogAddController::class, 'store'])->name('blog.store');

        Route::get('/blog-Setup', [BlogSetupController::class, 'index'])->name('blog-Setup');
        Route::get('/blog-edit/{id}', [BlogSetupController::class, 'edit'])->name('blog.edit'); // Edit route
        Route::put('/blog-update/{id}', [BlogSetupController::class, 'update'])->name('blog.update'); // Update route
        Route::delete('/blog-destroy/{id}', [BlogSetupController::class, 'destroy'])->name('blog.destroy'); // Delete route
   
    });

    // Logout Route
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
