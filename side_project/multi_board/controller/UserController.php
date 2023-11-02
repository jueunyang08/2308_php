<?php
// 상위 폴더
namespace controller;

class UserController extends ParentsController {
    // 로그인 login
    protected function loginGet() { // 자식에게는 해당 메소드만 작성을 해줌
        return "view/login.php"; // 리턴을 받는애는 부모 컨트롤러
    }

    // 회원가입 페이지 이동 regist
    protected function registGet() {
        return "view/regist"._EXTENSION_PHP;
    }
}