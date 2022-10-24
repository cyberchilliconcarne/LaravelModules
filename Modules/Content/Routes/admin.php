<?php

use Modules\Content\Http\Controllers\Admin\ContentCategoryController;
use Modules\Content\Http\Controllers\Admin\ContentPageController;
use Modules\Content\Http\Controllers\Admin\ContentTagController;
use Illuminate\Support\Facades\Route;

// Content Category
Route::delete('content-categories/destroy', [ContentCategoryController::class, 'massDestroy'])->name('content-categories.massDestroy');
Route::resource('content-categories', ContentCategoryController::class);

// Content Tag
Route::delete('content-tags/destroy', [ContentTagController::class, 'massDestroy'])->name('content-tags.massDestroy');
Route::resource('content-tags', ContentTagController::class);

// Content Page
Route::delete('content-pages/destroy', [ContentPageController::class, 'massDestroy'])->name('content-pages.massDestroy');
Route::post('content-pages/media', [ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
Route::post('content-pages/ckmedia', [ContentPageController::class, 'storeCKEditorImages'])->name('content-pages.storeCKEditorImages');
Route::resource('content-pages', ContentPageController::class);
