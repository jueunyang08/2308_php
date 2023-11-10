<?php

// 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// {{--
        
//     server 시작 하는 방법
//     터미널 / php artisan serve
    
//     server 종료 하는 방법
//     ctrl + C

//     서버 열고, c> Apache24> htdocs 로 파일 옮겨주기
    
    
// --}}



Route::get('/', function () {
    return view('welcome');
});

// 클로저 방식

// ------------------
// 라우트 정의
// ------------------

// 문자열 리턴
Route::get('/hi', function () { // localhost/hi
    return '안녕하세요.';
});

// 없는 뷰파일을 리턴할 때
Route::get('/myview', function () {
    return view('myview');
});

// ---------------------------------------------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행
// ----------------------------------------------------

// get, post, put, delete
// get method로 localhost/home으로 접속했을 때 'home' 뷰 파일을 리턴
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return 'method : POST';
});

Route::put('/home', function () {
    return '메소드 : PUT';
});

Route::delete('/home', function () {
    return '메소드 : DELETE';
});

// ----------------------
// 라우터에서 파라미터 제어
// ----------------------

// 쿼리 스트링에 파라미터가 세팅되서 요청이 올 때 파라미터 획득 http://localhost/query?id=1&name=fsdfsf
Route::get('/query', function (Request $request) { // 리퀘스트는 모든정보
    return $request->id.', '.$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function ($id) {
    return '세그먼트 파라미터 : '.$id;
});

// 2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id, $name) { // 각각 따로 가져옴
    return '세그먼트 파라미터 2개이상 : '.$id.', '.$name;
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});

// ------------------------------------------
// 라우트 매칭 실패시 대체 라우트 정의 ( 디폴트 )
// ------------------------------------------
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});

// ----------------
// 라우트의 이름 지정
// ----------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름있는 라우트';
})->name('name.user');

// --------
// 컨트롤러
// --------

// 커멘드로 컨트롤러 생성 :

// php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index');

// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);
//GET|HEAD        task .................... task.index › TaskController@index  
//POST            task .................... task.store › TaskController@store  
//GET|HEAD        task/create ............. task.create › TaskController@create  
//GET|HEAD        task/{task} ............. task.show › TaskController@show  
//PUT|PATCH       task/{task} ............. task.update › TaskController@update  
//DELETE          task/{task} ............. task.destroy › TaskController@destroy  
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit


