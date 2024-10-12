<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InventoryReportController;
use App\Http\Controllers\OrderFormController;
use App\Http\Controllers\PremixController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::resource('/orderform', OrderFormController::class);

Route::resource('/branches', BranchController::class)
->middleware(['auth', 'verified']);

Route::resource('/sales', SaleController::class)
->middleware(['auth', 'verified']);

Route::resource('/deliveries', DeliveryController::class)
->middleware(['auth', 'verified']);

// Route::resource('/products', ProductController::class)
// ->middleware(['auth', 'verified']);

Route::resource('/products', ProductController::class)
->middleware(['auth', 'verified']);

Route::resource('/premixes', PremixController::class)
->middleware(['auth', 'verified']);

Route::resource('/beverage', BeverageController::class)
->middleware(['auth', 'verified']);

Route::resource('/rawmaterials', RawMaterialController::class)
->middleware(['auth', 'verified']);

Route::resource('/clients', ClientController::class)
->middleware(['auth', 'verified']);

Route::resource('/suppliers', SupplierController::class)
->middleware(['auth', 'verified']);

Route::resource('/purchases', PurchaseController::class)
->middleware(['auth', 'verified']);

Route::resource('/salesreports', SalesReportController::class)
->middleware(['auth', 'verified']);

Route::resource('/inventoryreports', InventoryReportController::class)
->middleware(['auth', 'verified']);

Route::resource('/purchasereturns', PurchaseReturnController::class)
->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
