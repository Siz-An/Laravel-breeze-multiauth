<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\pages\Blog\BlogSetupController;

Route::get('/', [BlogSetupController::class, 'showBlogs'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); // Removed 'auth' middleware

// Keep only necessary route requirements
// require __DIR__.'/admin/pages/user/user-auth.php';
require __DIR__.'/admin/pages/blog/blog-auth.php';
require __DIR__.'/admin/admin-auth.php';
