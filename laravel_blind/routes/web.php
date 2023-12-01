<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController; // 보드컨트롤러 사용
use App\Http\Controllers\UserController; // 보드컨트롤러 사용
use Illuminate\Support\Facades\DB;
use App\Models\Board;
use App\Models\User;
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
// < User > 사용자 정의 메소드에 대한 라우트
// 유저관련
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get'); // 로그인 화면 이동
Route::middleware('my.user.validation')->post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post'); // 로그인 처리
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get'); // 회원가입 화면 이동
Route::middleware('my.user.validation')->post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post'); // 회원가입 처리
Route::get('/user/logout', [UserController::class, 'logoutget'])->name('user.logout.get'); // 로그아웃 처리

//  보드 기본 리소스 라우트
// Route::resource('/board', BoardController::class);

// 사용자 정의 메소드에 대한 라우트
Route::get('/board', [BoardController::class, 'index'])->name('board.index');
Route::get('/board/topic/{id}', [BoardController::class, 'showTopic'])->name('board.showTopic');
Route::get('/board/create', [BoardController::class, 'create'])->name('board.create');
Route::middleware('auth')->post('/board/store', [BoardController::class, 'store'])->name('board.store');