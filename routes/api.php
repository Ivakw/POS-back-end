<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;

require __DIR__ . '/authRoutes.php';

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('product')->group(function(){
        Route::post('create-product',[ProductController::class,'create'])->middleware('permission:create-product');
        Route::get('get-products',[ProductController::class,'list'])->middleware('permission:show-product-list');
        Route::get('get-product/{pro_id}',[ProductController::class,'show'])->middleware('permission:show-product');
        Route::delete('delete/{id}',[ProductController::class,'delete'])->middleware('permission:delete-product');
        Route::put('updateProduct/{id}',[ProductController::class,'update'])->middleware('permission:edit-product');
        Route::put('product-status/{id}',[ProductController::class,'statusUpdate'])->middleware('permission:product-status-update');
    });

    Route::prefix('stock')->group(function(){
        Route::post('create-stock',[StockController::class,'create'])->middleware('permission:create-stock');
    });
});


