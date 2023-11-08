<?php

// 유저의 입력값을 체크하는 기능

namespace lib;

use model\UserModel; // UserModel 사용

class Validation {   
    private static $arrErrorMsg = []; // Validation 용 에러메세지 저장 프로퍼티

    // 에러 메세지 반환용 메소드
    public static function getArrErrorMsg() { // getter 메소드 (캡슐화)
        return self::$arrErrorMsg;
    }

    // 에러 메세지 저장용 메소드
    public static function setArrErrorMsg($msg) { // setter 메소드
        self::$arrErrorMsg[] = $msg;
    }

    // 유효성 체크 메소드       (파라미터 타입)        : (리턴타입) 
    public static function userChk(array $inputData) : bool {
        // 정규식 처리
        $patternId = "/^[a-zA-Z0-9]{8,20}$/";
        $patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[a-zA-Z가-힣]{2,50}$/u";

        //--------------------------------------------------------------------------------------
        // **해당 키값이 있을때만 체크

        // 아이디 체크
        if(array_key_exists("u_id", $inputData)) { // array_key_exists(): 해당 배열에 키값이 있는지 체크 하는 함수
         
            if(preg_match($patternId, $inputData["u_id"], $match) === 0) {
                // ID 에러 처리
                $msg = "아이디는 8~20자, '영어 대소문자, 숫자' 만 입력 가능합니다.";
                self::setArrErrorMsg($msg);
            } 
        }

        // 비밀번호 체크
        if(array_key_exists("u_pw", $inputData)) { // array_key_exists(): 해당 배열에 키값이 있는지 체크 하는 함수
           if(preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
                // PW 에러 처리
                $msg = "비밀번호는 8~20자, '영어 대소문자, 숫자, !, @' 만 입력 가능합니다.";
                self::setArrErrorMsg($msg);
            }
            
        }

        // 비밀번호 확인 체크
        if(array_key_exists("u_pw_chk", $inputData)) {
            if($inputData["u_pw"] !== $inputData["u_pw_chk"]) {
                // PW 확인 에러처리
                $msg = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
                self::setArrErrorMsg($msg);
            }
        }

        // 이름 체크
        if(array_key_exists("u_name", $inputData)) { // array_key_exists(): 해당 배열에 키값이 있는지 체크 하는 함수
            if(preg_match($patternName, $inputData["u_name"], $match) === 0) {
                // NAME 에러 처리
                $msg = "이름은 2~50자, '한글, 영어 대소문자' 만 입력 가능합니다.";
                self::setArrErrorMsg($msg);
            }
        }
        //--------------------------------------------------------------------------------------
        // 리턴 처리
        if(count(self::$arrErrorMsg) > 0) {
            return false;
        }

        return true;
        //--------------------------------------------------------------------------------------
    }
}