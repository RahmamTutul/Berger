<?php

use App\Http\Controllers\Api\DiaryController;
use App\Http\Controllers\Api\PaintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/diary', DiaryController::class);
Route::resource('/paint', PaintController::class);