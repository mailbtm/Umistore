<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\DashboardSettingsController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/categories', [CategoryController::class, 'index'])->name('categories');
route::get('/categories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');
route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');

route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

route::group(['middleware' => ['auth']], function(){
    route::get('/cart', [CartController::class, 'index'])->name('cart');
    route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    route::get('/dashboard/products', [DashboardProductsController::class, 'index'])->name('dashboard-products');
    route::get('/dashboard/products-create', [DashboardProductsController::class, 'create'])->name('dashboard-products-create');
    route::post('/dashboard/products', [DashboardProductsController::class, 'store'])->name('dashboard-products-store');
    route::get('/dashboard/products-details/{id}', [DashboardProductsController::class, 'detail'])->name('dashboard-products-details');
    route::post('/dashboard/products-details/{id}', [DashboardProductsController::class, 'update'])->name('dashboard-products-update');

    route::post('/dashboard/products/gallery/upload', [DashboardProductsController::class, 'uploadGallery'])->name('dashboard-products-gallery-upload');
    route::get('/dashboard/products/gallery/delete/{id}', [DashboardProductsController::class, 'deleteGallery'])->name('dashboard-products-gallery-delete');

    route::get('/dashboard/transaction', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    route::get('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'detail'])->name('dashboard-transaction-details');
    route::post('/dashboard/transaction/{id}', [DashboardTransactionController::class, 'update'])->name('dashboard-transaction-update');

    route::get('/dashboard/settings', [DashboardSettingsController::class, 'settings'])->name('dashboard-settings');
    route::get('/dashboard/account', [DashboardSettingsController::class, 'account'])->name('dashboard-account');
    route::post('/dashboard/account/{redirect}', [DashboardSettingsController::class, 'update'])->name('dashboard-account-redirect');
});

route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    route::resource('/category', AdminCategoryController::class);
    route::resource('/user', UserController::class);
    route::resource('/product', ProductController::class);
    route::resource('/product-gallery', ProductGalleryController::class);
    route::resource('/transaction', TransactionController::class);
});

Auth::routes();
