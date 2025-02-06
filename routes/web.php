<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\DestinationController;
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

Route::get('/', function () {
    return view('welcome.home');
});

Route::view('/flights', 'welcome.flight')->name('welcome.flight');
Route::get('/tenants', [TenantController::class, 'userIndex'])->name('welcome.tenant');
Route::view('/information', 'welcome.information.index')->name('welcome.information.index');
Route::view('/customerservice', 'welcome.customerservice')->name('welcome.customerservice');

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

    Route::get('admin/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('admin/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('admin/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('admin/tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('admin/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('admin/tenant/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');

    Route::get('artworks', [ArtworkController::class, 'index'])->name('artworks.index');
    Route::get('artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
    Route::post('artworks', [ArtworkController::class, 'store'])->name('artworks.store');
    Route::get('artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');
    Route::put('artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');
    Route::delete('artwork/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');

    Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('hotel/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');

    Route::get('destinations', [DestinationController::class, 'index'])->name('destinations.index');
    Route::get('destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
    Route::post('destinations', [DestinationController::class, 'store'])->name('destinations.store');
    Route::get('destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
    Route::put('destinations/{destination}', [DestinationController::class, 'update'])->name('destinations.update');
    Route::delete('destination/{destination}', [DestinationController::class, 'destroy'])->name('destinations.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';