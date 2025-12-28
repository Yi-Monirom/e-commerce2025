<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // corrected namespace

// Example API route
Route::middleware('api')->get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/user', function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');
// Route::resource('categories', CategoryController::class);

Route::resource('categories', 'CategoryController');
Route::controller(CategoryController::class)->prefix('categories')->group(function() {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategories');
    Route::get('/{categoryId}', 'getCategoty');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});
