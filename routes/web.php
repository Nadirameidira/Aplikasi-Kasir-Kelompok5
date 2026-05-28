<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerReportController;
use Illuminate\Support\Facades\DB; 

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return redirect('/products');
});

// MODUL INVENTORI & PRODUK (/products) - STESA
// 1. GET /products : Menampilkan katalog produk, fitur pencarian, dan filter kategori.
Route::get('/products', function () {
    return view('products.index');
});

// 2. GET /products/create : Menampilkan form input produk baru.
Route::get('/products/create', function () {
    return view('products.create');
});

// 3. GET /products/{id}/edit : Menampilkan form untuk menyunting data dan stok produk.
Route::get('/products/{id}/edit', function ($id) {
    return view('products.edit', ['id' => $id]);
});

Route::middleware('auth')->group(function() { 

Route::resource('posts', PostController::class); 

Route::get('/reports/daily', 
[CustomerReportController::class, 'getDailyReport'
]);

Route::get('/reports/low-stock', 
[CustomerReportController::class, 'getLowStock'
]);

Route::get('/customers', 
[CustomerReportController::class, 'getAllCustomers'
]);

Route::get('/customers/register', 
[CustomerReportController::class, 'showRegisterForm'
]);

Route::post('/customers/register', 
[CustomerReportController::class, 'registerCustomer'
]);

}); 
    Route::resource('posts', PostController::class); 
}); 

Route::get('/vulnerable', function () { 
    $name = request('name'); 
    $user = DB::select("SELECT * FROM users WHERE name = '$name'"); 
    return $user; 
});

