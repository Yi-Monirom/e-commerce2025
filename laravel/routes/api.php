<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // corrected namespace
use App\Http\Controllers\ProductController;

//tp7
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\CommentController;


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
//tp7
Route::post('/authors', [AuthorController::class, 'store']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::post('/audiences', [AudienceController::class, 'store']);

Route::post('/subscribe', [AudienceController::class, 'subscribe']);

Route::post('/comments', [CommentController::class, 'store']);

// GET APIs
Route::get('/authors/{author}/articles', [AuthorController::class, 'articles']);
Route::get('/articles/{article}/audiences', [ArticleController::class, 'audiences']);
Route::get('/authors/{author}/audiences', [AuthorController::class, 'audiences']);
Route::get('/audiences/{audience}/comments', [AudienceController::class, 'comments']);
Route::get('/comments', [CommentController::class, 'index']);



