<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthUserController::class,'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/login',[AuthUserController::class,'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout',[AuthUserController::class,'logout'])
    ->middleware('auth')
    ->name('logout');
