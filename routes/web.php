<?php

use App\Http\Controllers\Dashboard\AdvertiserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PublisherController;
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

Route::get('/', function () {
    return view('web.home');
})->name('home');


require __DIR__ . '/auth.php';


// Index Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:admin,web'])->name('dashboard.home');

Route::middleware(['auth:admin'])->prefix('dashboard')->group(function () {

    // Start Advertiser Route
    Route::controller(AdvertiserController::class)
        ->prefix('advertisers')
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

    
});
