<?php

// 새로운 파일을 만들때 1. 라우터 2. 뷰 3. 컨트롤러 확인

namespace router; // 어디 경로에 있는지 적어주는 코드 

// 사용할 컨트롤러들 지정
use controller\UserController as UC;
use controller\BoardController as BC;

// 라우터 : 유저의 요청을 분석해서 해당 controller로 연결해주는 클래스 
class Router {
    public function __construct() {
        // URL 규칙
        // 1. 회원 정보 관련 URL
        //      user/[해당기능]
        //      ex) 로그인 : 호스트/user/login
        //      ex) 회원 : 호스트/user/regist
         // 2. 게시판 관련 URL
        //      board/[해당기능]
        //      ex) 리스트 : 호스트/board/list
        //      ex) 수정 : 호스트/board/edit

    $url = $_GET["url"]; // 접속 url을 획득
    // 유저가 GET 으로 올지 POST로 올지
    $method = $_SERVER["REQUEST_METHOD"]; // 메소드 확인

    // 분기 만들기

    // 로그인 GET OR POST
    if($url === "user/login") {
        if($method === "GET") {
            new UC("loginGet"); // 해당 클래스의 컨스트럭트를 실행
        }else {
            new UC("loginPost");
        }
    // 로그아웃 GET (로그아웃은 POST가 필요없음) 
    } else if($url === "user/logout") {
        if($method === "GET") {
            new UC("logoutGet");
        }
    // 회원가입 GET OR POST
    } else if($url === "user/regist") {
        if($method === "GET") {
            new UC("registGet");
        }else {
            new UC("registPost");
            
        }
    } else if($url === "board/list") {
        if($method  === "GET") {
            new BC("listGet");
        }
    } else if($url === "board/add") {
        if($method === "GET") {
            // 처리없음
        } else {
            new BC("addPost");
        }
    } else if ($url === "board/detail") {
        if($method === "GET") {
            new BC("detailGet");
        }
    }



    
    // 없는 경로일 경우
    echo "이상한 url : ".$url;
    exit();
    }
}
