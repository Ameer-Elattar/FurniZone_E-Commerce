<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::apiResource('products', ProductController::class);
Route::apiResource('carts', CartController::class);

Route::get('products/title/{title}', [ProductController::class, 'showByName']);




Route::delete('/users/{id}/cart', [CartController::class, 'destroyAllCartItems']);
Route::get('/users/{id}/cart', [CartController::class, 'getAllCartItems']);


Route::apiResource('users', UserController::class);

Route::delete('/users/{id}/cart', [CartController::class, 'destroyAllCartItems']);
Route::get('/users/{id}/cart', [CartController::class, 'getAllCartItems']);




Route::apiResource('orders', OrderController::class);
// Route::get('/orders', [OrderController::class, 'index']);