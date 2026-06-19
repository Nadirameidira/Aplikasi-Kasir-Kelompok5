<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerReportController;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShiftController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->group(function() {
    Route::get('/kasir/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

Route::middleware(['auth', 'kasir'])->prefix('kasir')->group(function () {
    Route::get('/', [KasirController::class, 'dashboard']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/kasir', [AdminController::class, 'kasirList'])->name('admin.kasir');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kasir/shift/open', [ShiftController::class, 'openForm'])->name('shift.open.form');
    Route::post('/kasir/shift/open', [ShiftController::class, 'open'])->name('shift.open');
    Route::post('/kasir/shift/close', [ShiftController::class, 'close'])->name('shift.close');
});

Route::middleware(['auth', 'kasir', 'check.shift'])->prefix('kasir')->group(function () {
    Route::get('/', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
});

//Route::middleware('auth')->group(function() { 
Route::resource('posts', PostController::class); 
//}); 

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Suppliers
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::middleware('auth')->group(function() { 
    Route::resource('posts', PostController::class); 

    Route::get('/reports/daily', [CustomerReportController::class, 'getDailyReport']);
    Route::get('/reports/low-stock', [CustomerReportController::class, 'getLowStock']);
    Route::get('/customers', [CustomerReportController::class, 'getAllCustomers']);
    Route::get('/customers/register', [CustomerReportController::class, 'showRegisterForm']);
    Route::post('/customers/register', [CustomerReportController::class, 'registerCustomer']);

    Route::prefix('transactions')->group(function () {
        Route::get('/checkout', [TransactionController::class, 'checkout'])->name('transactions.checkout'); 
        Route::post('/checkout', [TransactionController::class, 'store'])->name('transactions.store'); 
        Route::get('/history', [TransactionController::class, 'history'])->name('transactions.history'); 
        Route::get('/{id}', [TransactionController::class, 'show'])->name('transactions.show'); 
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy'); 
    });
});

Route::get('/safe-query', function () { 
    $name = request('name'); 
    $user = DB::table('users')->where('name', $name)->get(); 
    return $user; 
});

