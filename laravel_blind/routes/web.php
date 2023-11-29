<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController; // 보드컨트롤러 사용
use Illuminate\Support\Facades\DB;
use App\Models\Board;
use App\Models\Category;

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

    return redirect('/board');

});

//  보드 기본 리소스 라우트
Route::resource('/board', BoardController::class);

// 사용자 정의 메소드에 대한 라우트
Route::get('/board/topic', [BoardController::class, 'showTopic']);