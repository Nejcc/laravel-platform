<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Administration routes
|--------------------------------------------------------------------------
| middleware: [web,auth]
| prefix: admin
| name: admin
|
*/


Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::resource('/users', App\Http\Controllers\Admin\UsersController::class)->only(['index', 'show']);
Route::resource('/sitemap', App\Http\Controllers\Admin\SiteMapListController::class)->only(['index', 'show']);

