<?php

use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\AdvertisementDashboardController;
use App\Http\Controllers\Dashboard\AdvertiserController;
use App\Http\Controllers\Dashboard\BlogsController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LinksController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\PublisherController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\TestimonialController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['auth:admin'])
    ->prefix(LaravelLocalization::setLocale().'/dashboard')
    ->group(function () {

    // Start Admin Routes
    Route::controller(AdminsController::class)
        ->prefix('admins')
        ->as('admin.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Admin Routes

    // Start Role Routes
    Route::controller(RolesController::class)
        ->prefix('roles')
        ->as('role.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Role Routes

    // Start Advertiser Routes
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
    // End Advertiser Routes

    // Start Publisher Routes
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
    // End Publisher Routes

    // Start Country Routes
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
    // End Country Routes

    // Start Category Routes
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
    // End Category Routes

    // Start Category Routes
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
    // End Category Routes

    // Start Package Routes
    Route::controller(PackageController::class)
        ->prefix('packages')
        ->as('package.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/', 'destroy')->name('delete');
        });
    // End Package Routes

    // Start Contact Us Routes
    Route::controller(ContactUsController::class)
        ->prefix('contact_us')
        ->as('contact_dashboard.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/delete-contact', 'destroy')->name('delete');
        });
    // End Contact Us Routes

        // Start Testimonial Routes
        Route::controller(TestimonialController::class)
            ->prefix('testimonials')
            ->as('testimonial.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::get('/delete-testimonial', 'destroy')->name('delete');
                Route::get('/change-status', 'changeStatus')->name('changeStatus');
            });
        // End Testimonial Routes

        // Start Blogs Routes
        Route::controller(BlogsController::class)
            ->prefix('blogs')
            ->as('blog_dashboard.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::get('/delete-blog', 'destroy')->name('delete');
            });
        // End Blogs Routes

        // Start Blogs Routes
        Route::controller(SettingsController::class)
            ->prefix('settings')
            ->as('setting.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
            });
        // End Blogs Routes

        // Start Blogs Routes
        Route::controller(LinksController::class)
            ->prefix('links')
            ->as('link.')
            ->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/changeStatus', 'changeStatus')->name('changeStatus');
            });
        // End Blogs Routes
});
