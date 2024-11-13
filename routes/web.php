<?php

use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/account', function () {
        return view('account');
    });
});
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/account', function () {
        return view('account');
    });
});
// Route:: redirect( 'redirect-by-route', 'logiп');

Route::get('/tasks', 'App\Http\Controllers\TasksController@index');

Route::fallback(function () {
    return 123;
});
