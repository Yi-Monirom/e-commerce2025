<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // corrected namespace
use App\Http\Controllers\ProductController;

// Example API route
Route::middleware('api')->get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/user', function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');
// Route::resource('categories', CategoryController::class);

// Route::resource('categories', 'CategoryController');
Route::controller(CategoryController::class)->prefix('categories')->group(function() {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategories');
    Route::get('/{categoryId}', 'getCategoty');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});
// Route::resource('products','ProductController');
Route::controller(ProductController::class)
    ->prefix('products')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/active', 'activeProducts');
        Route::get('/price-2000', 'price2000');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });



