<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    if ($request->wantsJson()) {
        return response()->json([
            'title' => env('APP_NAME'),
            'description' => env('APP_DESCRIPTION'),
            'language' => 'PHP ' . PHP_VERSION,
            'framework' => 'Laravel v' . Illuminate\Foundation\Application::VERSION
        ]);
    } else {
        return view('welcome');
    }
});
