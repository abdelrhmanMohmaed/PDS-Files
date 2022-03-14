<?php

use App\Http\Controllers\admin\DashbourdController;
use App\Http\Controllers\web\FilesController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\PartsController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('search', [PartsController::class, 'show']);
    // start get all models and items Route by Ajax Request 
    Route::post('/get-car/model', [HomeController::class, 'getModels']);
    Route::post('/model/part-number', [HomeController::class, 'getParts']);
    Route::get('/model/part-number/{id}', [PartsController::class, 'show']);
    // get all files Route by Ajax Request
    Route::post('/getData/pds', [PartsController::class, 'pds']);
    Route::post('/getData/work-instruction', [PartsController::class, 'work']);
    Route::post('/getData/pack-instruction', [PartsController::class, 'pack']);
    // End get all models and items Route by Ajax Request 

    // Store ,Download ,Delete Route
    Route::get('downloud-pds/{id}', [FilesController::class, 'downloadPds']);
    Route::get('downloud-work/{id}', [FilesController::class, 'downloadWork']);
    Route::get('downloud-pack/{id}', [FilesController::class, 'downloadPack']);

    // superAdmin and admin can pass
    Route::middleware('admins')->group(function () {
        // store Route
        Route::post('store/pds/{id}', [FilesController::class, 'storePds']);
        Route::post('store/work/{id}', [FilesController::class, 'storeWork']);
        Route::post('store/pack/{id}', [FilesController::class, 'storePack']);
        // delete Route
        Route::get('delete-pds/{id}', [FilesController::class, 'deletePds']);
        Route::get('delete-work/{id}', [FilesController::class, 'deleteWork']);
        Route::get('delete-pack/{id}', [FilesController::class, 'deletePack']);
    });
    // Dashboud superAdmin only can pass
    Route::prefix('dashbourd')->middleware('superAdmin')->group(function () {
        
        Route::get('add-category', [DashbourdController::class, 'index']);
        Route::post('store-company', [DashbourdController::class, 'storeCompany']);
        Route::post('store-model', [DashbourdController::class, 'storeModel']);

        Route::get('change-password', [DashbourdController::class, 'show']);
        Route::post('update-password', [DashbourdController::class, 'updatePass']);
    });
});
