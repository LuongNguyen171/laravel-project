<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Models\ProductStyle;

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


//Route::post('/product', [ProductController::class, 'getProductInfo']);
Route::post('/product', [ProductController::class, 'getProductInfo']);


//lấy sản phẩm theo ID
Route::get('/product/{productId}', [ProductController::class, 'getProductInfo']);

//lấy tất cả ảnh theo id sản phẩm
Route::get('/product-image/{productId}', [ProductController::class, 'getProductImage']);


//lấy thông tin sản phẩm theo kiểu sản phẩm
Route::get('/products-by-style/{styleId}', [ProductController::class, 'getProductsByStyle']);
//lấy top 10 sản phẩm bán chạy
Route::get('/top-products', [ProductController::class, 'getTopProducts']);


// authentication routes
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

// user routes
Route::put('user/update-user-info', [UserController::class, 'updateUserInfo'])->middleware('auth:api');
Route::post('user/change-password', [UserController::class, 'changeUserPassword'])->middleware('auth:api');
Route::get('user/get-all-bills', [UserController::class, 'getUserBills'])->middleware('auth:api');

//product routes
Route::get('/products', [ProductController::class, 'getProducts']);
Route::post('/product/add-product', [ProductController::class, 'addProduct'])->middleware('auth:api');
Route::put('/product/update-product/{id}', [ProductController::class, 'updateProduct'])->middleware('auth:api');
Route::delete('/product/delete-product/{id}', [ProductController::class, 'deleteProduct']);
