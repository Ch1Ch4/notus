<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('comments.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('comments.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->middleware(AdminMiddleware::class);
    Route::resource('categories', CategoryController::class)->middleware(AdminMiddleware::class);
    Route::resource('products', ProductController::class)->middleware(AdminMiddleware::class);
    Route::resource('comments', CommentController::class)->only(['index', 'edit', 'update', 'destroy']);

    Route::delete('/product-images/{id}', [ProductImageController::class, 'destroy'])->name('product-images.destroy')->middleware(AdminMiddleware::class);;
});

require __DIR__.'/auth.php';
