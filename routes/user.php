<?php

use App\Http\Controllers\User\AdvertisementController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::namespace('\App\Http\Controllers\User')->middleware('auth:web')
    ->prefix(LaravelLocalization::setLocale().'/clients')
    ->group( function() {

    // Start Advertisement Route
    Route::controller(AdvertisementController::class)
        ->prefix('advertisements')
        ->as('advertisement.')
        ->group(function () {
            // Additional Route
            Route::post('/{id}/store-media', 'storeMedia')->name('storeMedia');
            Route::get('/delete-media', 'deleteMedia')->name('deleteMedia');
            Route::get('/delete', 'destroy')->name('delete');

            // Normal Route
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');

        });
    // End Advertisement Route

});