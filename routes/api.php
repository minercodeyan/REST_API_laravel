<?php

use App\Http\Controllers\api\GroupController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware'=>['auth:sanctum']], function(){
    //group rotes
    Route::resource("groups",GroupController::class);

    //product rotes
    Route::get('/products/add-group', [ProductController::class, 'addProductsGroup']);
    Route::resource("products",ProductController::class);
    Route::post('/logout',[AuthController::class,'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
