<?php

use App\Http\Controllers\Dashboard\AdvertisementDashboardController;
use App\Http\Controllers\Dashboard\AdvertiserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PublisherController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['auth:admin'])->prefix(LaravelLocalization::setLocale().'/dashboard')->group(function () {

    // Start Advertiser Route
    Route::controller(AdvertiserController::class)
        ->prefix('/advertisers/')
        ->as('advertiser.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Advertiser Route

    // Start Publisher Route
    Route::controller(PublisherController::class)
        ->prefix('publishers')
        ->as('publisher.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Publisher Route

    // Start Country Route
    Route::controller(CountryController::class)
        ->prefix('countries')
        ->as('country.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
            Route::get('/change-status', 'changeStatus')->name('changeStatus');
        });
    // End Country Route

    // Start Category Route
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->as('category_dashboard.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
            Route::get('/change-status', 'changeStatus')->name('changeStatus');
        });
    // End Category Route

    // Start Category Route
    Route::controller(AdvertisementDashboardController::class)
        ->prefix('advertisement')
        ->as('advertisement_dashboard.')
        ->group(function() {
            Route::get('/delete', 'destroy')->name('delete');
            Route::get('/change-status', 'changeStatus')->name('changeStatus');
            Route::get('/{id}/show-media', 'showMedia')->name('showMedia');
            Route::get('/delete-media', 'deleteMedia')->name('deleteMedia');
            Route::post('/{id}/store-media', 'storeMedia')->name('storeMedia');

            Route::get('/{status}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');


        });
    // End Category Route



});
