<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController; // 보드컨트롤러 사용

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
    return view('board');
});

// 보드관련
Route::resource('/board', BoardController::class);