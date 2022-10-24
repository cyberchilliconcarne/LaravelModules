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

use Illuminate\Support\Facades\Route;
use Modules\Asset\Http\Controllers\Frontend\AssetCategoryController;
use Modules\Asset\Http\Controllers\Frontend\AssetController;
use Modules\Asset\Http\Controllers\Frontend\AssetLocationController;
use Modules\Asset\Http\Controllers\Frontend\AssetsHistoryController;
use Modules\Asset\Http\Controllers\Frontend\AssetStatusController;

Route::resource('assets', AssetController::class);
Route::resource('asset-locations', AssetLocationController::class);
Route::resource('asset-statuses', AssetStatusController::class);
Route::resource('assets-histories', AssetsHistoryController::class, ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
Route::resource('asset-categories', AssetCategoryController::class);

// Asset Category
Route::delete('asset-categories/destroy', [AssetCategoryController::class, 'massDestroy'])->name('asset-categories.massDestroy');

// Asset Location
Route::delete('asset-locations/destroy', [AssetLocationController::class, 'massDestroy'])->name('asset-locations.massDestroy');

// Asset Status
Route::delete('asset-statuses/destroy', [AssetStatusController::class, 'massDestroy'])->name('asset-statuses.massDestroy');

// Asset
Route::delete('assets/destroy', [AssetController::class, 'massDestroy'])->name('assets.massDestroy');
Route::post('assets/media', [AssetController::class, 'storeMedia'])->name('assets.storeMedia');
Route::post('assets/ckmedia', [AssetController::class, 'storeCKEditorImages'])->name('assets.storeCKEditorImages');

// Assets History


