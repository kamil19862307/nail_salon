<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index');

Route::middleware('auth')->group(function (){
    Route::view('/admin', 'admin.index', ['title' => 'Main page']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('admin/login', [AuthController::class, 'signIn'])->name('admin.signIn');
});

Route::prefix('admin')->middleware('auth')->controller(PostController::class)->group(function (){
    Route::get('/posts', 'index')->name('admin.posts');
    Route::get('/posts/create', 'create')->name('admin.posts.create');
    Route::post('/posts/create', 'store')->name('admin.posts.store');
    Route::get('/posts/{post}/edit', 'edit')->name('admin.posts.edit');
    Route::patch('/posts/{post}', 'update')->name('admin.posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('admin.posts.destroy');
});

Route::prefix('admin')
    ->middleware('auth')
    ->controller(UserController::class)
    ->group(function (){
        Route::get('/users', 'index')->name('admin.users');
        Route::get('/users/create', 'create')->name('admin.users.create');
        Route::post('/users/create', 'store')->name('admin.users.store');
        Route::get('/users/{user}/edit', 'edit')->name('admin.users.edit');
        Route::patch('/users/{user}', 'update')->name('admin.users.update');
        Route::delete('/users/{user}', 'destroy')->name('admin.users.destroy');
});

Route::prefix('admin')->middleware('auth')->controller(CalendarController::class)->group(function (){
    Route::get('calendar', 'index')->name('admin.calendar');
});
