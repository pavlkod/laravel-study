<?php

use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 123;
    return view('welcome');
});

Route::group([], function () {
    Route::get('/test', function () {
        return view('test')->with([
            'items' => [
                [
                    'name' => 'user'
                ],
                [
                    'name' => 'admin'
                ]
            ]
        ]);
    });

    Route::get('/test/{id}', function ($id) {
        return view('test-detail', ['id' => $id]);
    })->name('test.id');

    Route::get('/test/{id}/comments/{comment}', function ($id) {
        echo $id;
        return view('test-detail-comment');
    })->name('test.id.comment');
});

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

Route::fallback(function () {
    return 123;
});
