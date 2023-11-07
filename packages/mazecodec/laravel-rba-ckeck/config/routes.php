<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mazecodec\LaravelRbaCheck\Http\Controllers\RoleController;
use Mazecodec\LaravelRbaCheck\Services\CheckUserHasAllowedRoleInterface;
use Orchestra\Testbench\Factories\UserFactory;


Route::prefix('rbac')->group(function () {
    Route::get('/', [RoleController::class, 'mazecodec'])->middleware('role:user,admin,partner');
    Route::get('/', [RoleController::class, 'mazecodec'])->middleware('role:partner');
    Route::get('/', [RoleController::class, 'mazecodec'])->middleware('role:admin');
    Route::get('/', [RoleController::class, 'index']);
});
