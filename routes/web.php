<?php

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendLoginController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendProductController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Backend\BackendSettingsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\ToyPurchaseController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn() => view('home'))->name('home');
    Route::get('/docs', fn() => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();


    // Dashboard
    Route::view('backend/login', 'backend.pages.auth.login')
        ->name('backend.login');
    Route::post('backend/logout', [BackendLoginController::class, 'logout'])
        ->name('backend.logout');
    Route::view('reset_password', 'auth/login')
        ->name('backend.reset_password');
    Route::post('admin/login', [BackendLoginController::class, 'login'])
        ->name('backend.auth');
    Route::get('backend/profile/edit', [BackendLoginController::class, 'edit'])
        ->name('profile.edit');
    Route::put('backend/profile/update', [BackendLoginController::class, 'update'])
        ->name('profile.update');

    Route::prefix('backend')->middleware('admin')->group(function () {
            Route::resource('locales', \App\Http\Controllers\Backend\BackendLocaleController::class)->except('show');

            Route::resource('menu_items', \App\Http\Controllers\Backend\BackendMenuItemController::class)->except('show');

            Route::resource('menus', \App\Http\Controllers\Backend\BackendMenuController::class)->except('show');

            Route::resource('settings', \App\Http\Controllers\Backend\BackendSettingController::class)->except('show');




        // Dashboard

        Route::get('/', [DashboardController::class, 'backend'])
            ->name('backend.dashboard.backend');

        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('backend.dashboard');

        // Administrators
        Route::resource('administrators', AdminsController::class)->except('show');

        // Roles
        Route::resource('roles', RolesController::class)->except('show');

        // Permissions
        Route::resource('permissions', PermissionsController::class)->except('show');

        // Toy Purchases
        Route::resource('toy_purchases', ToyPurchaseController::class)->except('show');

        // Categories
        Route::resource('categories', BackendCategoryController::class)->except('show');

        // Menus
        Route::resource('menus', BackendMenuController::class)->except('show');

        // Products
        Route::resource('products', BackendProductController::class)->except('show');
        Route::get('products/import_images', [BackendProductController::class, 'importImages'])->name('products.import_images');
        Route::post('products/import_images', [BackendProductController::class, 'storeFromImages'])->name('products.store_from_images');

        // Settings
        Route::resource('settings', BackendSettingController::class)->except('show');


    });

    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [HomeController::class, 'home'])->name('home.home');

});
