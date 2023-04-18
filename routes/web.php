<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Web\AdsController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ShareController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Route::get('/', function () {
//    return view('web.home');
//})->name('home');


require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
require __DIR__ . '/user.php';


// Start Index Dashboard
Route::get(LaravelLocalization::setLocale().'/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth:admin,web'])
    ->name('dashboard.home');
// End Index Dashboard

Route::namespace('App\Http\Controllers\Web')
    ->prefix(LaravelLocalization::setLocale())
    ->group(function() {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Start Category Route
    Route::controller(CategoriesController::class)
        ->prefix('categories')
        ->as('category.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
        });
    // End Category Route

    // Start Ads Route
    Route::controller(AdsController::class)
        ->prefix('ads')
        ->as('ad.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/{userId?}/{type?}', 'show')->name('show');
        });
    // End Ads Route

    // Start Share Route
    Route::controller(ShareController::class)
        ->prefix('shares')
        ->as('share.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/store', 'store')->name('store');
            Route::get('/{id}/{type}', 'show')->name('show');
        });
    // End Share Route

});
