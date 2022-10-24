<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Frontend\Crm\CrmCustomerController;
use App\Http\Controllers\Frontend\Crm\CrmDocumentController;
use App\Http\Controllers\Frontend\Crm\CrmNoteController;
use App\Http\Controllers\Frontend\Crm\CrmStatusController;
use App\Http\Controllers\Frontend\Faq\FaqCategoryController;
use App\Http\Controllers\Frontend\Faq\FaqQuestionController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Product\ProductCategoryController;
use App\Http\Controllers\Frontend\Product\ProductController;
use App\Http\Controllers\Frontend\Product\ProductTagController;
use App\Http\Controllers\Frontend\Task\TaskController;
use App\Http\Controllers\Frontend\Task\TaskTagController;
use App\Http\Controllers\Frontend\User\PermissionsController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\RolesController;
use App\Http\Controllers\Frontend\User\UsersController;
use App\Http\Controllers\UserVerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Route::get('userVerification/{token}', [UserVerificationController::class, 'approve'])->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
});

Route::group(['as' => 'frontend.', 'middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'user'], function () {
        // Permissions
        Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', PermissionsController::class);

        // Roles
        Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', RolesController::class);

        // Users
        Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
        Route::resource('users', UsersController::class);
    });

    Route::group(['prefix' => 'crm'], function () {
        // Crm Status
        Route::delete('crm-statuses/destroy', [CrmStatusController::class, 'massDestroy'])->name('crm-statuses.massDestroy');
        Route::resource('crm-statuses', CrmStatusController::class);

        // Crm Customer
        Route::delete('crm-customers/destroy', [CrmCustomerController::class, 'massDestroy'])->name('crm-customers.massDestroy');
        Route::resource('crm-customers', CrmCustomerController::class);

        // Crm Note
        Route::delete('crm-notes/destroy', [CrmNoteController::class, 'massDestroy'])->name('crm-notes.massDestroy');
        Route::resource('crm-notes', CrmNoteController::class);

        // Crm Document
        Route::delete('crm-documents/destroy', [CrmDocumentController::class, 'massDestroy'])->name('crm-documents.massDestroy');
        Route::post('crm-documents/media', [CrmDocumentController::class, 'storeMedia'])->name('crm-documents.storeMedia');
        Route::post('crm-documents/ckmedia', [CrmDocumentController::class, 'storeCKEditorImages'])->name('crm-documents.storeCKEditorImages');
        Route::resource('crm-documents', CrmDocumentController::class);
    });

    Route::group(['prefix' => 'product'], function () {
        // Product Category
        Route::delete('product-categories/destroy', [ProductCategoryController::class, 'massDestroy'])->name('product-categories.massDestroy');
        Route::post('product-categories/media', [ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
        Route::post('product-categories/ckmedia', [ProductCategoryController::class, 'storeCKEditorImages'])->name('product-categories.storeCKEditorImages');
        Route::resource('product-categories', ProductCategoryController::class);

        // Product Tag
        Route::delete('product-tags/destroy', [ProductTagController::class, 'massDestroy'])->name('product-tags.massDestroy');
        Route::resource('product-tags', ProductTagController::class);

        // Product
        Route::delete('products/destroy', [ProductController::class, 'massDestroy'])->name('products.massDestroy');
        Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
        Route::post('products/ckmedia', [ProductController::class, 'storeCKEditorImages'])->name('products.storeCKEditorImages');
        Route::resource('products', ProductController::class);
    });

    Route::group(['prefix' => 'faq'], function () {
        // Faq Category
        Route::delete('faq-categories/destroy', [FaqCategoryController::class, 'massDestroy'])->name('faq-categories.massDestroy');
        Route::resource('faq-categories', FaqCategoryController::class);

        // Faq Question
        Route::delete('faq-questions/destroy', [FaqQuestionController::class, 'massDestroy'])->name('faq-questions.massDestroy');
        Route::resource('faq-questions', FaqQuestionController::class);
    });

    Route::group(['prefix' => 'task'], function () {
        // Task Tag
        Route::delete('task-tags/destroy', [TaskTagController::class, 'massDestroy'])->name('task-tags.massDestroy');
        Route::resource('task-tags', TaskTagController::class);

        // Task
        Route::delete('tasks/destroy', [TaskController::class, 'massDestroy'])->name('tasks.massDestroy');
        Route::post('tasks/media', [TaskController::class, 'storeMedia'])->name('tasks.storeMedia');
        Route::post('tasks/ckmedia', [TaskController::class, 'storeCKEditorImages'])->name('tasks.storeCKEditorImages');
        Route::resource('tasks', TaskController::class);

        Route::get('frontend/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('frontend/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('frontend/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('frontend/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    });
});
