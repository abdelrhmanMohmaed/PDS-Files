<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

    Route::controller(HomeController::class)->name('get.')->group(
        function () {
            Route::prefix('get/')->group(function () {

                Route::post('model', 'getModels')->name('model');
                Route::post('part', 'getParts')->name('part');
            });

            Route::get('show/{part}', 'show')->name('show');
        }
    );

    Route::controller(FileController::class)->name('file.')->group(
        function () {
            // Route::get('show/machine/{machine}', 'showFileMachine')->name('show.machine');

            Route::get('show/file/{part}/{name}', 'showfile')->name('show');
            Route::post('store/file/{part}/{name}', 'store')->name('store');
            Route::post('update', 'update')->name('update');
            Route::get('download/{id}/{name}', 'download')->name('download');

            Route::post('delete', 'delete')->name('delete')->middleware('CheckRole');
        }
    );

    Route::controller(VideoController::class)->name('video.')->group(
        function () {

            Route::get('show/video/{part}/{name}', 'show')->name('show');
            Route::post('store/video/{part}/{name}', 'store')->name('store');
            Route::get('down/{id}/{name}', 'download')->name('Down');
            Route::get('watch/{id}/{name}', 'watch')->name('watch');

            Route::post('del', 'delete')->name('delete')->middleware('CheckRole');
            Route::post('edit/title', 'update')->name('update')->middleware('CheckRole');
        }
    );

    Route::controller(UserController::class)->name('user.')->group(
        function () {

            Route::get('show', 'edit')->name('show');
            Route::post('update/{user}', 'update')->name('update');

            Route::middleware('CheckRole')->group(function () {
                Route::get('new/user', 'show')->name('new');
                Route::post('new/user/store', 'store')->name('store');
            });
        }
    );

    Route::middleware('CheckRole')->prefix('category')->controller(CatController::class)->name('category.')->group(
        function () {

            Route::get('/', 'index')->name('new');
            Route::post('store/company', 'store_company')->name('store.company');
            Route::post('store/model', 'store_model')->name('store.model');
            Route::post('store/part', 'store_part')->name('store.part');
            Route::get('edit', 'edit')->name('edit');
            Route::post('part/edit', 'update_part')->name('edit.part');
            Route::post('part/delete', 'delete_part')->name('delete.part');

            Route::post('model/edit', 'update_model')->name('edit.model');
            Route::post('model/delete', 'delete_model')->name('delete.model');

            Route::post('company/edit', 'update_company')->name('edit.company');
            Route::post('company/delete', 'delete_company')->name('delete.company');
        }
    );


    Route::controller(AnalysisController::class)->name('analysis.')->group(
        function () {

            Route::get('analysis', 'index')->name('index');
            Route::get('/get/analysis', 'analysisData')->name('get.analysis');
        }
    );
});
