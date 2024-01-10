<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// remove cache
Route::get('/clear-cache', function () {
    return Cache::forget('products');
});

// route to compare caching using redis or not
Route::get('/products', [App\Http\Controllers\API\ProductController::class, 'getProductsWithoutRedis']);
Route::get('/products-redis', [App\Http\Controllers\API\ProductController::class, 'getProductsWithRedis']);
