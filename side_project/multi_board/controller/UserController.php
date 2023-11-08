<?php
// 상위 폴더
namespace controller;

use model\UserModel; // UserModel 사용
use lib\Validation; // Validation 사용

class UserController extends ParentsController {

    // 로그인 login 페이지 이동
    protected function loginGet() { // 자식에게는 해당 메소드만 작성을 해줌
        return "view/login.php"; // 리턴을 받는애는 부모 컨트롤러
    }

    // 로그인 처리
    protected function loginPost() {
        $inputData = [
            "u_id" => $_POST["u_id"],
            "u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크 
        if(!Validation::userChk($inputData)) {
            $this->arrErrorMsg = Validation::getArrErrorMsg();
            return "view/login.php";
        }
        
        // ID, PW 설정 (DB에서 사용할 데이터 가공)
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"];
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);
        // 원본 데이터 값을 실수로 변경하지 않기위해 따로 변수(배열)로 담음

        $modelUser = new UserModel();
        $resultUserInfo = $modelUser->getUserInfo($arrInput, true);

        // 유저 유무 체크
        if(count($resultUserInfo) === 0) {
            $this->arrErrorMsg[]="아이디와 비밀번호를 다시 확인해 주세요";
            // 로그인 페이지로 리턴
            return "view/login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["id"] = $resultUserInfo[0]["id"];
        $_SESSION["u_name"] = $resultUserInfo[0]["u_name"];

        return "Location: /board/list?b_type=0";

    }
    // 로그아웃 처리
    protected function logoutGet() {
        session_unset(); 
        session_destroy(); // 파기

            // 로그인 페이지 리턴
            return "Location: /user/login";
    }


    // 회원가입 페이지 이동 regist GET
    protected function registGet() {
        return "view/regist"._EXTENSION_PHP;
    
    }

    // 회원가입 처리 regist POST
    protected function registPost() {
        $inputData = [
            "u_id" => $_POST["u_id"],
            "u_pw" => $_POST["u_pw"],
            "u_pw_chk" => $_POST["u_pw_chk"],
            "u_name" => $_POST["u_name"]
        ];
 
        $arrAddUserInfo = [
            "u_id" => $_POST["u_id"],
            "u_pw" => $this->encryptionPassword($_POST["u_pw"]),
            "u_name" => $_POST["u_name"]
        ];
        
        // 유효성 체크 
        if(!Validation::userChk($inputData)) {
            $this->arrErrorMsg = Validation::getArrErrorMsg();
            return "view/regist.php";
        }

        // TODO : 아이디 중복 체크 필요


        // 인서트 처리
        $userModel = new UserModel();
        $userModel->beginTransaction();
        $result = $userModel->addUserInfo($arrAddUserInfo);

        if($result !== true) {
            $userModel-> rollback();
        } else {
            $userModel-> commit();
        }
        $userModel-> destroy();

        return "Location: /user/login";
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}