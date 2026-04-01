<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Resources;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', [function () {
    return view('welcome');
}]);

Route::get('/', [WelcomeController::class, 'index']);

Route::view('/', 'welcome');

Route::get('/', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/{postId}', function($postId) {
    return new Resources\Post(Post::find($postId));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
