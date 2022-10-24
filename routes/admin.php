<?php

use App\Http\Controllers\Admin\Chat\MessengerController;
use App\Http\Controllers\Admin\Crm\CrmCustomerController;
use App\Http\Controllers\Admin\Crm\CrmDocumentController;
use App\Http\Controllers\Admin\Crm\CrmNoteController;
use App\Http\Controllers\Admin\Crm\CrmStatusController;
use App\Http\Controllers\Admin\Faq\FaqCategoryController;
use App\Http\Controllers\Admin\Faq\FaqQuestionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductTagController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\Task\TaskController;
use App\Http\Controllers\Admin\Task\TasksCalendarController;
use App\Http\Controllers\Admin\Task\TaskStatusController;
use App\Http\Controllers\Admin\Task\TaskTagController;
use App\Http\Controllers\Admin\User\PermissionsController;
use App\Http\Controllers\Admin\User\RolesController;
use App\Http\Controllers\Admin\User\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('system-calendar', [SystemCalendarController::class, 'index'])->name('systemCalendar');

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
    // Task Status
    Route::delete('task-statuses/destroy', [TaskStatusController::class, 'massDestroy'])->name('task-statuses.massDestroy');
    Route::resource('task-statuses', TaskStatusController::class);

    // Task Tag
    Route::delete('task-tags/destroy', [TaskTagController::class, 'massDestroy'])->name('task-tags.massDestroy');
    Route::resource('task-tags', TaskTagController::class);

    // Task
    Route::delete('tasks/destroy', [TaskController::class, 'massDestroy'])->name('tasks.massDestroy');
    Route::post('tasks/media', [TaskController::class, 'storeMedia'])->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', [TaskController::class, 'storeCKEditorImages'])->name('tasks.storeCKEditorImages');
    Route::resource('tasks', TaskController::class);

    // Tasks Calendar
    Route::resource('tasks-calendars', TasksCalendarController::class, ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});

Route::group(['prefix' => 'chat'], function () {
    Route::get('messenger', [MessengerController::class, 'index'])->name('messenger.index');
    Route::get('messenger/create', [MessengerController::class, 'createTopic'])->name('messenger.createTopic');
    Route::post('messenger', [MessengerController::class, 'storeTopic'])->name('messenger.storeTopic');
    Route::get('messenger/inbox', [MessengerController::class, 'showInbox'])->name('messenger.showInbox');
    Route::get('messenger/outbox', [MessengerController::class, 'showOutbox'])->name('messenger.showOutbox');
    Route::get('messenger/{topic}', [MessengerController::class, 'showMessages'])->name('messenger.showMessages');
    Route::delete('messenger/{topic}', [MessengerController::class, 'destroyTopic'])->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', [MessengerController::class, 'replyToTopic'])->name('messenger.reply');
    Route::get('messenger/{topic}/reply', [MessengerController::class, 'showReply'])->name('messenger.showReply');
});
