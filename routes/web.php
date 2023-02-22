<?php

use App\Http\Controllers\Dashboard\DashboardController;
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
});


require __DIR__ . '/auth.php';

Route::prefix('dashboard')->group(function () {

    // Index Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
});
