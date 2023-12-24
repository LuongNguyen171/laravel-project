<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MailController;


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


// authentication routes
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/reset-password', [AuthController::class, 'resetPassword'])->middleware('auth:api');
Route::get('auth/user-infor', [AuthController::class, 'getUserInfo'])->middleware('auth:api');

//mail routes
Route::post('mail/reset-password', [MailController::class, 'requestResetPasswordEmail']);
Route::post('mail/confirm-Bill', [MailController::class, 'requestConfirmBillEmail']);
Route::get('mail/test', [MailController::class, 'test']);

// user routes
Route::put('user/update-user-info', [UserController::class, 'updateUserInfo'])->middleware('auth:api');
Route::post('user/change-password', [UserController::class, 'changeUserPassword'])->middleware('auth:api');
Route::get('user/get-all-bills', [UserController::class, 'getUserBills'])->middleware('auth:api');

// bill routes
Route::post('bill/create-bill', [BillController::class, 'createBill']);
Route::get('bill/get-bill-user', [BillController::class, 'getBillByUser'])->middleware('auth:api');;

//product routes admin
Route::get('/products', [ProductController::class, 'getProducts']);
Route::post('/product/add-product', [ProductController::class, 'addProduct'])->middleware('auth:api');
Route::put('/product/update-product/{id}', [ProductController::class, 'updateProduct'])->middleware('auth:api');
Route::delete('/product/delete-product/{id}', [ProductController::class, 'deleteProduct']);

////product routes
Route::get('/product/{productId}', [ProductController::class, 'getProductInfo']);
Route::get('/product-image/{productId}', [ProductController::class, 'getProductImage']);
Route::get('/products-by-style/{styleId}', [ProductController::class, 'getProductsByStyle']);
Route::get('/top-products', [ProductController::class, 'getTopProducts']);
Route::get('/top-productsHighestPrice', [ProductController::class, 'getTopProductsHighestPrice']);
