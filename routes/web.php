<?php


use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Posts\AllPosts;
use App\Livewire\Pages\Posts\ShowPost;
use App\Livewire\Pages\Users\ShowUser;
use Illuminate\Support\Facades\Route;

Route::get('/', AllPosts::class)->name('home');

Route::get('posts/{post:slug}', ShowPost::class)->name('posts.show');

Route::get('users/{user:name}', ShowUser::class)->name('users.show');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');

    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard')->middleware('can: access dashboard');
});