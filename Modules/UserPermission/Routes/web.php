<?php

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

Route::prefix('admin/user/permission')->name('admin.')->group(function() {
    Route::get('/', [\Modules\UserPermission\Http\Controllers\UserPermissionController::class, 'index'])->name('permissions');
    Route::post('/syncUserPermissions', [\Modules\UserPermission\Http\Controllers\UserPermissionController::class, 'syncUserPermissions']);

});

