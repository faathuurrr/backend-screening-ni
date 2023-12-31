<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('user');

// Authentication Group
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::apiResource('/user', 'App\Http\Controllers\Api\UserController');


    // User Group
    // Route::prefix('/user')->name('user.')->middleware('auth:sanctum')->group(function () {
    //     Route::get('/', [UserController::class, 'get'])->name('get');
    //     Route::post('/', [UserController::class, 'create'])->name('create');
    //     Route::put('/', [UserController::class, 'update'])->name('update');
    //     Route::delete('/', [UserController::class, 'delete'])->name('delete');
    // });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
