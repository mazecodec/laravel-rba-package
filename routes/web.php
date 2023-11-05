<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Se utilizará AlpineJS
 * https://dcreations.es/blog/laravel/implementar-alpine-js-en-laravel-10
 * https://laraveltuts.com/step-by-step-guide-to-user-role-and-permission-tutorial-in-laravel-10/
 * https://www.laratutorials.com/laravel-10-multiple-user-role-based-authentication-example/
 * https://martinbean.dev/blog/2021/07/29/simple-role-based-authentication-laravel/
 */


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->middleware(['client'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['admin-agent'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
