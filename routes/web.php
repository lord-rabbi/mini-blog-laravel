<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/articles', [MainController::class, 'articles'])->name('articles.index');
Route::get('/articles/{slug}', [MainController::class, 'article'])->name('articles.show');
Route::get('/categories', [MainController::class, 'categories'])->name('categories.index');
Route::get('/about', [MainController::class, 'about'])->name('about');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/articles', [DashboardController::class, 'articles'])->name('articles');
    Route::get('/categories', [DashboardController::class, 'categories'])->name('categories');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/comments', [DashboardController::class, 'comments'])->name('comments');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
});
