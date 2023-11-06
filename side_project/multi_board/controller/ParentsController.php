<?php

namespace controller;

// 오버라이드 : (부모클래스한테 있는 메소드를 자식클래스에게 새롭게 정의하는것 )
use model\BoardNameModel;

class ParentsController {
    // 캡슐화 (나와 내 상속관계에서만 쓸수있는 멤버를 만듬)
    //(프라이빗은 게터나 새터같은 메소드를 정의 해야함.)

    protected $controllerChkUrl; //헤더 표시 제어용 문자열
    protected $arrErrorMsg = []; //화면에 표시할 에러메세지 배열
    protected $arrBoardNameInfo; // 헤더 게시판 드롭다운 표시용

    //비로그인 시 접속 불가능한 URL 리스트
    private $arrNeedAuth = [     // 부모 컨트롤러 에서만 접근  
        "board/list"
    ];


    // ----------------------------------------------------------------------------
    public function __construct($action) {
        // 뷰 관련 체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // 세션 시작 (웹서버에 저장 (보안상 꼭 필요한 정보들만 저장. because 성능저하) ) // 쿠키 : (유저의 웹에 저장)
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // 헤더 게시판 드롭다운 박스 데이터 획득
        $boardNameModel = new BoardNameModel;
        $this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
        $boardNameModel->destroy();// 파기(더이상 사용X)

        // controller 메소드 호출 
        $resultAction = $this->$action();

        // view호출
        $this->callView($resultAction);
        exit();
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"];

        // 접속 권한이 없는 페이지 접속 차단
        if( !isset($_SESSION["id"]) && in_array($url, $this->arrNeedAuth) ) {  
            header("Location: /user/login");
            exit();
        }
    // 로그인한 상태에서 로그인 페이지 접속시 board/list로 이동
    if( isset($_SESSION["id"]) && $url === "user/login" ) {
        header("Location: /board/list");
        exit();
        }
    }

    // 뷰 호출용 메소드
    private function callView($path) {
        // view/list.php
        // Location: /board/list
        if(strpos($path, "Location:") === 0 ) {
            header($path);
        } else {
            require_once($path);
        }
    }
}

