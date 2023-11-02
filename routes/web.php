<?php

use App\Domain\Enums\RoleUserTypes;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**
 * Se utilizará AlpineJS
 * https://dcreations.es/blog/laravel/implementar-alpine-js-en-laravel-10
 * https://laraveltuts.com/step-by-step-guide-to-user-role-and-permission-tutorial-in-laravel-10/
 * https://www.laratutorials.com/laravel-10-multiple-user-role-based-authentication-example/
 * https://martinbean.dev/blog/2021/07/29/simple-role-based-authentication-laravel/
 */

Route::get('/', function () {
    return redirect('auth.login');
//    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'user-access:' . RoleUserTypes::CLIENTE->stringValue()])->group(function () {
    Route::get('/', function () {
        dd('cliente');
    });
});

Route::middleware(['auth', 'user-access: ' . RoleUserTypes::GESTOR->stringValue()])->group(function () {
    Route::get('/', function () {
        dd('gestor');
    });
});

Route::middleware(['auth', 'user-access:' . RoleUserTypes::ADMIN->stringValue()])->group(function () {
    Route::get('/', function () {
        dd('admin');
    });
});


require __DIR__ . '/auth.php';
