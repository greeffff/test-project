<?php

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

Route::post('message', [\App\Http\Controllers\MessageController::class, 'store']);
Route::get('user/{id}/statistic-message', [\App\Http\Controllers\User\StatisticMessageController::class, 'index']);
