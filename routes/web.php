<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// If you want to use UI package please disable in config/app.php ->   App\Providers\FortifyServiceProvider::class
//Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cms')->name('cms.')->group(function () {
    Route::resource('/pages', \App\Http\Controllers\Cms\PageController::class)->only('index', 'show');
});

Route::resource('/posts', \App\Http\Controllers\PostController::class)->only('index', 'show', 'store');


//Permission
Route::get('/permission',[\App\Http\Controllers\PermissionUserController::class, 'index'])->name('permission.index');
Route::post('/permission',[\App\Http\Controllers\PermissionUserController::class, 'store'])->name('permission.store');

