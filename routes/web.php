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


Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__ . '/auth.php';
