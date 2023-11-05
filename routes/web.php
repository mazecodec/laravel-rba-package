<?php

use App\Domain\Enums\RoleUserTypes;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Se utilizará AlpineJS
 * https://dcreations.es/blog/laravel/implementar-alpine-js-en-laravel-10
 * https://laraveltuts.com/step-by-step-guide-to-user-role-and-permission-tutorial-in-laravel-10/
 * https://www.laratutorials.com/laravel-10-multiple-user-role-based-authentication-example/
 * https://martinbean.dev/blog/2021/07/29/simple-role-based-authentication-laravel/
 */

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/', function () {
//        dd('CLIENT ZONE', auth()->user());
//    });
//});

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            dd(auth()->user()->roles);
//            return view('dashboard', [
//                'env' => auth()->user()->roles
//            ]);
        })->name('dashboard')->middleware([
            'user-access:' . RoleUserTypes::AGENT->stringValue(),
        ]);

//        Route::get('/', function () {
//            return view('dashboard', [
//                'env' => auth()->user()->role->stringValue()
//            ]);
//        })->name('home_gestor')->middleware(['user-access:' . RoleUserTypes::GESTOR->stringValue()]);

        Route::get('/', function () {
            dd('CLIENTE ZONE', auth()->user());
        })->name('home_cliente')->middleware(['user-access:' . RoleUserTypes::CLIENT->stringValue()]);
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
