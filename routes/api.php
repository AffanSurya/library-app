<?php

use App\Http\Controllers\ApiBookController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [ApiBookController::class, 'index']);

Route::post('/books', [ApiBookController::class, 'store']);

Route::get('/books/{id}', [ApiBookController::class, 'show']);

Route::put('/books/{id}', [ApiBookController::class, 'update']);

Route::delete('/books/{id}', [ApiBookController::class, 'destroy']);

