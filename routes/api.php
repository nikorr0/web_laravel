<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('guest')->group(function () {
    Route::get('/login',  [AuthenticatedSessionController::class, 'create'])
          ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/auth/login', [AuthController::class, 'login']); 

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource('cards', \App\Http\Controllers\Api\CardController::class);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('friends/{id}', [\App\Http\Controllers\Api\FriendController::class, 'store']);
    Route::delete('friends/{id}', [\App\Http\Controllers\Api\FriendController::class, 'destroy']);
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)->only(['index', 'show']);
    Route::get('/feed', [\App\Http\Controllers\Api\FeedController::class, 'index']);
    
    Route::post('cards/{card}/comments', [\App\Http\Controllers\Api\CommentController::class, 'store'])
         ->name('comments.store');
    Route::delete('comments/{comment}', [\App\Http\Controllers\Api\CommentController::class, 'destroy'])
         ->name('comments.destroy');

    Route::apiResource('cards', \App\Http\Controllers\Api\CardController::class);

    Route::post('/cards', [\App\Http\Controllers\Api\CardController::class, 'store'])
         ->name('cards.store');
    Route::match(['delete'], '/cards/{card}', [\App\Http\Controllers\Api\CardController::class, 'destroy'])
         ->name('cards.destroy');
         
    Route::match(['put','patch'], '/cards/{card}', [\App\Http\Controllers\Api\CardController::class, 'update'])
         ->name('cards.update');
});
