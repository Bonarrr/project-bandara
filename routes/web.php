<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FlightInfoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FlightInfoController::class, 'fetchHomeFlights'])->name('welcome.home');
Route::get('/flight', [FlightInfoController::class, 'fetchData'])->name('welcome.flight');
Route::get('/tenant', [TenantController::class, 'userIndex'])->name('welcome.tenant');
Route::view('/customerservice', 'welcome.customerservice')->name('welcome.customerservice');
Route::view('/information', 'welcome.information.index')->name('welcome.information.index');
Route::get('/information/artwork', [ArtworkController::class, 'userIndex'])->name('welcome.information.artwork');
Route::get('/information/hotel', [HotelController::class, 'userIndex'])->name('welcome.information.hotel');
Route::view('/information/landtransport', 'welcome.information.landtransport')->name('welcome.information.landtransport');
Route::get('/information/todo', [DestinationController::class, 'userIndex'])->name('welcome.information.todo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('admin/tenants', [TenantController::class, 'index'])->name('admin.tenants.index');
    Route::get('admin/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('admin/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('admin/tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('admin/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('admin/tenant/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');

    Route::get('admin/artworks', [ArtworkController::class, 'index'])->name('admin.artworks.index');
    Route::get('admin/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
    Route::post('admin/artworks', [ArtworkController::class, 'store'])->name('artworks.store');
    Route::get('admin/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');
    Route::put('admin/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');
    Route::delete('admin/artwork/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');

    Route::get('admin/hotels', [HotelController::class, 'index'])->name('admin.hotels.index');
    Route::get('admin/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('admin/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('admin/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('admin/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('admin/hotel/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');

    Route::get('admin/destinations', [DestinationController::class, 'index'])->name('admin.destinations.index');
    Route::get('admin/destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
    Route::post('admin/destinations', [DestinationController::class, 'store'])->name('destinations.store');
    Route::get('admin/destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
    Route::put('admin/destinations/{destination}', [DestinationController::class, 'update'])->name('destinations.update');
    Route::delete('admin/destination/{destination}', [DestinationController::class, 'destroy'])->name('destinations.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

