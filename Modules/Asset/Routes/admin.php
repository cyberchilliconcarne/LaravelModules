<?php

use Illuminate\Support\Facades\Route;
use Modules\Asset\Http\Controllers\Admin\AssetCategoryController;
use Modules\Asset\Http\Controllers\Admin\AssetController;
use Modules\Asset\Http\Controllers\Admin\AssetLocationController;
use Modules\Asset\Http\Controllers\Admin\AssetsHistoryController;
use Modules\Asset\Http\Controllers\Admin\AssetStatusController;

// Asset Category
Route::delete('asset-categories/destroy', [AssetCategoryController::class, 'massDestroy'])->name('asset-categories.massDestroy');
Route::resource('asset-categories', AssetCategoryController::class);

// Asset Location
Route::delete('asset-locations/destroy', [AssetLocationController::class, 'massDestroy'])->name('asset-locations.massDestroy');
Route::resource('asset-locations', AssetLocationController::class);

// Asset Status
Route::delete('asset-statuses/destroy', [AssetStatusController::class, 'massDestroy'])->name('asset-statuses.massDestroy');
Route::resource('asset-statuses', AssetStatusController::class);

// Asset
Route::delete('assets/destroy', [AssetController::class, 'massDestroy'])->name('assets.massDestroy');
Route::post('assets/media', [AssetController::class, 'storeMedia'])->name('assets.storeMedia');
Route::post('assets/ckmedia', [AssetController::class, 'storeCKEditorImages'])->name('assets.storeCKEditorImages');
Route::resource('assets', AssetController::class);

// Assets History
Route::get('assets-histories', [AssetsHistoryController::class, 'index'])->name('assets-histories.index');
