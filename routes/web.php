<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::name('get.')->group(function () {
        Route::prefix('get/')->group(function () {

            Route::post('model', [HomeController::class, 'getModels'])->name('model');
            Route::post('part', [HomeController::class, 'getParts'])->name('part');
        });

        Route::get('show/{part}', [HomeController::class, 'show'])->name('show');
    });


    Route::name('file.')->group(function () {

        Route::get('show/file/{part}/{name}', [FileController::class, 'showfile'])->name('show');
        Route::post('store/file/{part}/{name}', [FileController::class, 'store'])->name('store');
        Route::get('download/{id}/{name}', [FileController::class, 'download'])->name('download');

        Route::post('delete', [FileController::class, 'delete'])->name('delete')->middleware('CheckRole');
    });


    Route::name('user.')->group(function () {

        Route::get('show', [UserController::class, 'edit'])->name('show');
        Route::post('update/{user}', [UserController::class, 'update'])->name('update');

        Route::middleware('CheckRole')->group(function () {
            Route::get('new/user', [UserController::class, 'show'])->name('new');
            Route::post('new/user/store', [UserController::class,   'store'])->name('store');
        });
    });

    Route::middleware('CheckRole')->prefix('category')->name('category.')->group(function () {

        Route::get('/', [CatController::class, 'index'])->name('new');
        Route::post('store/company', [CatController::class, 'store_company'])->name('store.company');
        Route::post('store/model', [CatController::class, 'store_model'])->name('store.model');
        Route::post('store/part', [CatController::class, 'store_part'])->name('store.part');
    });
});
