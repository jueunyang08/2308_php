<?php

namespace controller;

// 오버라이드 : (부모클래스한테 있는 메소드를 자식클래스에게 새롭게 정의하는것 )

class ParentsController {
    protected $controllerChkUrl; 
    
    
    public function __construct($action) {
        // 뷰 관련 체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // controller 메소드 호출 
        $resultAction = $this->$action();

        // view호출
        require_once($resultAction);
        exit();
    }
}

