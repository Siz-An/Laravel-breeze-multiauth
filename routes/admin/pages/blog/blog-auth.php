<?php

use App\Http\Controllers\admin\pages\Blog\BlogCategoryController;
use App\Http\Controllers\admin\pages\Blog\BlogSetupController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    // Routes for Blog Setup with a new prefix 'blogSetup'
    Route::prefix('blogSetup')->name('blogSetup.')->group(function () {
        Route::get('/', [BlogSetupController::class, 'index'])->name('index');
        Route::post('/store', [BlogSetupController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [BlogSetupController::class, 'destroy'])->name('destroy');
        Route::put('/update/{id}', [BlogSetupController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [BlogSetupController::class, 'edit'])->name('edit');
        Route::get('/add', [BlogSetupController::class, 'create'])->name('create');
        
    });

    // Routes for Blog Categories (unchanged)
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/blogCategory', [BlogCategoryController::class, 'index'])->name('blogCategory');
        Route::post('/store', [BlogCategoryController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('destroy');
        Route::put('/update/{id}', [BlogCategoryController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [BlogCategoryController::class, 'edit'])->name('edit');
        Route::post('/category/{id}/toggle-publish', [BlogCategoryController::class, 'togglePublish'])->name('admin.blog.category.toggle-publish');
    });
});