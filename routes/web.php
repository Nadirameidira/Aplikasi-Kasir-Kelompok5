<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerReportController;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KasirController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'kasir'])->prefix('kasir')->group(function () {
    Route::get('/', [KasirController::class, 'dashboard']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
});

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

Route::get('/products/{id}/edit', function ($id) {
    return view('products.edit', ['id' => $id]);
})->name('products.edit');

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