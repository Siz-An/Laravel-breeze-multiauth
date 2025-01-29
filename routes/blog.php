<?php

use App\Http\Controllers\Admin\Page\BlogAddController;
use App\Http\Controllers\Admin\Page\BlogSetupController;
use App\Http\Controllers\BlogCategoryController;
use Illuminate\Support\Facades\Route;

// Blog Routes (Requires Admin Authentication)
Route::middleware('auth:admin')->prefix('admin/Pages')->name('admin.Pages.')->group(function () {
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

    // Blog Setup management
    Route::get('/blog-Setup', [BlogSetupController::class, 'index'])->name('blog-Setup');
    Route::get('/blog-edit/{id}', [BlogSetupController::class, 'edit'])->name('blog.edit'); // Edit route
    Route::put('/blog-update/{id}', [BlogSetupController::class, 'update'])->name('blog.update'); // Update route
    Route::delete('/blog-destroy/{id}', [BlogSetupController::class, 'destroy'])->name('blog.destroy'); // Delete route
});
