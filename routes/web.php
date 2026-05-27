<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\SeoController as AdminSeo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/* ----------------------------------------------------------------------
 |  PARTIE PUBLIQUE (visiteur)
 |  US1, US2, US3 : voir catégories, parcourir, voir détail produit
 |---------------------------------------------------------------------- */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

/* ----------------------------------------------------------------------
 |  PANIER (visiteur ou membre) — US8, US9
 |---------------------------------------------------------------------- */
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::patch('/items/{item}', [CartController::class, 'update'])->name('update');
    Route::delete('/items/{item}', [CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
});

/* ----------------------------------------------------------------------
 |  AUTHENTIFICATION — US4, US5, US7
 |---------------------------------------------------------------------- */
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [ProfileController::class, 'logout'])
    ->middleware('auth')->name('logout');

/* ----------------------------------------------------------------------
 |  COOKIES (RGPD) — accessible à tous
 |---------------------------------------------------------------------- */
Route::get('/cookies', [CookieController::class, 'show'])->name('cookies.show');
Route::post('/cookies', [CookieController::class, 'store'])->name('cookies.store');
Route::post('/cookies/reset', [CookieController::class, 'reset'])->name('cookies.reset');

/* ----------------------------------------------------------------------
 |  PAGES STATIQUES (CGV, mentions, FAQ, etc.)
 |---------------------------------------------------------------------- */
Route::get('/p/{page}', [PageController::class, 'show'])->name('pages.show');

/* ----------------------------------------------------------------------
 |  ZONE MEMBRE — US6, US10, US11
 |---------------------------------------------------------------------- */
Route::middleware('auth')->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel/{order}', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    // Mes commandes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

/* ----------------------------------------------------------------------
 |  ZONE ADMIN — US12, US13, US14, US15, US16
 |---------------------------------------------------------------------- */
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::resource('products', AdminProduct::class)->except('show');
    Route::resource('orders', AdminOrder::class)->only(['index', 'show', 'update']);
    Route::resource('categories', AdminCategory::class)->only(['index', 'store', 'update', 'destroy']);

    Route::get('/seo', [AdminSeo::class, 'index'])->name('seo');
});
