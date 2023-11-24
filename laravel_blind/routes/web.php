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

           // 게시글 획득
           $boardresult = Board::get();
           $categoryresult = Category::get();
           

           return view('list')->with('b_data', $boardresult)->with('c_data', $categoryresult);

});

// 보드관련
Route::resource('/board', BoardController::class);