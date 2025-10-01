<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::paginate(5);
    return view('index', compact('posts'));
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    $post->load(['user', 'comments']);
    return view('posts.show',compact('post'));
})->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'login']);


    Route::get('register', [RegisterController::class,'show'])->name('register');
    Route::post('register', [RegisterController::class,'register']);
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('users.dashboard');
    })->name('dashboard');
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
});