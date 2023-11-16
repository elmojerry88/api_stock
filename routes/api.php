<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\UserController;

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

Route::post('/signup', [LoginController::class, 'signup']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::prefix('weapon')->group(function () {
    Route::get('/', [WeaponController::class, 'index']);
    Route::post('/store', [WeaponController::class, 'store']);
    Route::get('/{id}', [WeaponController::class, 'show']);
    Route::delete('/delete/{id}', [WeaponController::class, 'destroy'] );
    Route::patch('/update/{id}', [WeaponController::class, 'update']);
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy'] );
    Route::patch('/update/{id}', [UserController::class, 'update']);
});

Route::prefix('officer')->group(function () {
    Route::get('/', [OfficerController::class, 'index']);
    Route::post('/store', [OfficerController::class, 'store']);
    Route::get('/{id}', [OfficerController::class, 'show']);
    Route::delete('/delete/{id}', [OfficerController::class, 'destroy'] );
    Route::patch('/update/{id}', [OfficerController::class, 'update']);
});

Route::prefix('receive')->group(function () {
    Route::get('/', [ReceiveController::class, 'index']);
    Route::post('/store', [ReceiveController::class, 'store']);
    Route::get('/{id}', [ReceiveController::class, 'show']);
    Route::delete('/delete/{id}', [ReceiveController::class, 'destroy'] );
    Route::patch('/update/{id}', [ReceiveController::class, 'update']);
});

Route::prefix('leave')->group(function () {
    Route::get('/', [LeaveController::class, 'index']);
    Route::post('/store', [LeaveController::class, 'store']);
    Route::get('/{id}', [LeaveController::class, 'show']);
    Route::delete('/delete/{id}', [LeaveController::class, 'destroy'] );
    Route::patch('/update/{id}', [LeaveController::class, 'update']);
});