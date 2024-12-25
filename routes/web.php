<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cards.index');
});
Route::resource('cards', CardController::class);
Route::resource('users', UserController::class);
Route::middleware('auth')->group(function () {
    Route::get('/trash', [CardController::class, 'indexTrash'])->name('cards.indexTrash');
    Route::post('/trash/{card}/restore', [CardController::class, 'restore'])->name('cards.restore');
    Route::delete('/trash/{card}/force-delete', [CardController::class, 'forceDelete'])->name('cards.forceDelete');
    Route::get('/usercards/{user}', [CardController::class, 'userCards'])->name('user.cards');
});
Route::get('/dashboard', function () {
    return redirect()->route('cards.index');
})->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('cards/{card}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');
Route::middleware('auth')->group(function () {
    Route::post('users/{user}/add-friend', [FriendController::class, 'addFriend'])->name('friends.add');
    Route::post('users/{user}/remove-friend', [FriendController::class, 'removeFriend'])->name('friends.remove');
});
Route::get('/feed', [UserController::class, 'feed'])->middleware('auth')->name('user.feed');
require __DIR__.'/auth.php';