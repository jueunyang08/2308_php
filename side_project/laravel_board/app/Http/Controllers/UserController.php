<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget() {
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }

        return view('login');
    }

    public function loginpost(Request $request) {

        /* ------------- del 231116 미들웨어로 이관 -------------

        // 유효성 (validation) 검사
        $validator = Validator::make(
            $request->only('email', 'password'),
            [
                'email' => 'required|email|max:50', // 필수입력 | 이메일형식 | 최대:50
                'password' => 'required' // passwordchk 랑 같은지 체크 
            ]
        );
         // 유효성 (validation) 검사 실패 시 처리
         if($validator->fails()) {
            return view('login')->withErrors($validator->errors());
        }
        -----------------------------------------------------------*/

        // 유저 정보 습득
        $result = User::where('email', $request->email)->first();
        if(!$result || !(Hash::check($request->password, $result->password))) {
            $errorMsg= '이메일과 비밀번호 다시 확인해주세요.';
            return view('login')->withErrors($errorMsg);
        }

        // 유저 인증작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = "인증 에러가 발생 했습니다.";
            return view('login')->withErrors($errorMsg);
        }

        return redirect()->route('board.index');
    }

    public function registrationget() {
        return view('registration');
    }
    
    public function registrationpost(Request $request) {

        /* ------------- del 231116 미들웨어로 이관 -------------------

        // 유효성 (validation) 검사
        $validator = Validator::make(
            $request->only('email', 'password', 'passwordchk', 'name'),
            [
                'email' => 'required|email|max:50', // 필수입력 | 이메일형식 | 최대:50
                'name' => 'required|regex:/^[a-zA-z가-힣]+$/|min:2|max:50', // 필수입력 | 정규식 |
                'password' => 'required|same:passwordchk' // passwordchk 랑 같은지 체크 
            ]
        );

        // 유효성 (validation) 검사 실패 시 처리
        if($validator->fails()) {
            return view('registration')->withErrors($validator->errors());
        }
        -----------------------------------------------------------*/

        // ** 데이터 베이스에 저장할 데이터 획득 **
        // request 에 담긴 정보들 중 담고싶은 정보만 담아 출력 / 변수명->only(''); /
        $data = $request->only('email', 'password', 'name'); 

        // 비밀번호 암호화 (라라벨에서 제공해주는 비밀번호 암호화)
        $data['password'] = Hash::make($data['password']);

        // 회원 정보 DB에 저장
        $result = User::create($data);

        return redirect()->route('user.login.get');
    }

    public function logoutget() {
        Session::flush(); // 세션파기
        Auth::logout(); // 로그아웃
        return redirect()->route('user.login.get');
    }
}
