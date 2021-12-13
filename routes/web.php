<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PaintController;
use App\Http\Controllers\SocialiteController;
use App\Models\Diary;
use App\Models\Paint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $diaries= Diary::paginate(3);
    $paints = Paint::latest()->take(5)->get();
    return view('frontend.index')->with(compact('diaries','paints'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/facebook', [SocialiteController::class, 'loginFacebook']);
Route::get('/login/facebook/callback', [SocialiteController::class, 'loginFacebookCallback']);

Route::prefix('/diary')->group(function () {
       Route::get('index',[DiaryController::class,'index']);
       Route::match(['get', 'post'], 'add',[DiaryController::class,'add']);
       Route::match(['get', 'post'], 'edit/{id}',[DiaryController::class,'edit']);
       Route::get('delete/{id}',[DiaryController::class,'delete']);
});
Route::prefix('/paint')->group(function () {
       Route::get('index',[PaintController::class,'index']);
       Route::match(['get', 'post'], 'add',[PaintController::class,'add']);
       Route::match(['get', 'post'], 'edit/{id}',[PaintController::class,'edit']);
       Route::get('delete/{id}',[PaintController::class,'delete']);
});
