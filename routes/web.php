<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'App\Http\Controllers\CardController@index');

Route::get('/', function () {
    return redirect()->route('cards.index');
});

Route::resource('cards', CardController::class);