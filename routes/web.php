<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{products:id}', [ProductController::class, 'show']);

Route::get('/category/{category:slug}', [ProductController::class, 'showByCategory']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/edit-product/{products:id}', [ProductController::class, 'showEdit']);
    Route::delete('/products/{products:id}', [ProductController::class, 'destroy']);
    Route::patch('/products/{products:id}', [ProductController::class, 'update']);

    Route::get('/jual/{user:username}', [ProductController::class, 'showByUser']);
    Route::post('/comments', [CommentController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'me']);
    Route::get('/profile/{user:username}', [ProfileController::class, 'showByUser']);
    Route::patch('/profile/{user:id}', [ProfileController::class, 'update']);
});
