<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FinanceRecordController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasswordResetController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes(['reset' =>true]);

Route::get('/SpicyParadise', [Controller::class, 'showPublic']);


Route::group(['prefix' => 'SpicyParadise'], function(){
    
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');



    Route::middleware(['auth'])->group(function() {

        Route::prefix('menu')->group(function () {
            Route::get('/{section?}', [MenuController::class, 'showMenu'])->name('menu');
            Route::post('/search', [MenuController::class, 'search'])->name('menu.search');
            
            // Menu items routes
            Route::post('/items', [MenuController::class, 'store'])->name('menu.item.store');
            Route::get('/items/{id}/edit', [MenuController::class, 'edit'])->name('menu.item.edit');
            Route::put('/items/{id}', [MenuController::class, 'update'])->name('menu.item.update');
            Route::delete('/items/{id}', [MenuController::class, 'destroy'])->name('menu.item.delete');
            Route::get('/items/{id}/toggle-status', [MenuController::class, 'toggleStatus'])->name('menu.item.toggle-status');
            
            Route::prefix('offers')->group(function() {
                Route::get('/{id}/edit', [MenuController::class, 'editOffer'])->name('menu.offer.edit');
                Route::put('/{id}', [MenuController::class, 'updateOffer'])->name('menu.offer.update');
                Route::get('/{id}/publish', [MenuController::class, 'publishOffer'])->name('menu.offer.publish');
            });
        });

        // маршруты управления сотрудниками
        Route::prefix('staff')->group(function() {
            Route::get('/{section?}', [StaffController::class, 'showStaff'])->name('staff');
            Route::get('/create-form', [StaffController::class, 'createForm'])->name('staff.create-form');
            Route::post('/', [StaffController::class, 'store'])->name('staff.store');
            Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
            Route::put('/{id}', [StaffController::class, 'update'])->name('staff.update');
            Route::delete('/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
        });

        // маршруты управления расписанием
        Route::get('/schedule/{section?}/{month?}', [ScheduleController::class, 'show'])
            ->name('schedule')
            ->where('month', '[0-9]{4}-[0-9]{2}');
            Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
        Route::post('/schedule/update', [ScheduleController::class, 'update'])
            ->name('schedule.update');

        // Маршруты для склада
    
         Route::get('/product-record/{section?}', [WarehouseController::class, 'showProductRecord'])->name('product-record');
        Route::post('/store-items', [WarehouseController::class, 'storeItem'])->name('store-items.store');
        Route::get('/store-items/{id}/edit', [WarehouseController::class, 'editStoreItem'])->name('store-items.edit');
        Route::put('/store-items/{id}', [WarehouseController::class, 'updateStoreItem'])->name('store-items.update');
        Route::delete('/store-items/{id}', [WarehouseController::class, 'deleteStoreItem'])->name('store-items.delete');

        // Маршруты для инвентаризации
        Route::post('/inventory', [WarehouseController::class, 'storeInventory'])->name('inventory.store');
        Route::get('/inventory/search', [WarehouseController::class, 'searchInventory'])->name('inventory.search');
        
        // Маршруты для поставок
        Route::post('/deliveries', [WarehouseController::class, 'storeDelivery'])->name('deliveries.store');
        Route::get('/deliveries/search', [WarehouseController::class, 'searchDelivery'])->name('deliveries.search');
        
        // Маршруты для поставщиков
        Route::post('/suppliers', [WarehouseController::class, 'storeSupplier'])->name('suppliers.store');
        Route::get('/suppliers/{id}/edit', [WarehouseController::class, 'editSupplier'])->name('suppliers.edit');
        Route::put('/suppliers/{id}', [WarehouseController::class, 'updateSupplier'])->name('suppliers.update');
        Route::delete('/suppliers/{id}/delete', [WarehouseController::class, 'deleteSupplier'])->name('suppliers.delete');
        


        // маршруты финансового учета
        Route::get('/finance-record/{section?}', [FinanceRecordController::class, 'showFinanceRecord'])->name('finance-record');
        Route::post('/financial-operations', [FinanceRecordController::class, 'storeOperations'])->name('financial-operations.store');
        Route::get('/financial-operations/search', [FinanceRecordController::class, 'searchOperations'])->name('financial-operations.search');


        // выход из системы
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

});