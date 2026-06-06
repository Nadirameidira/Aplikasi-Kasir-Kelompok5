<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use  App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB; 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);


Route::get('/vulnerable', function () { 
$name = request('name'); 
$user = DB::select("SELECT * FROM users WHERE name = '$name'"); 
return $user; 
}); 

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function() { 
Route::resource('posts', PostController::class); 
}); 