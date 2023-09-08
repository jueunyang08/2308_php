<?php
// 연결 연산자 (.)
// $str1 = "안녕";
// $str2 = "하세요.";
// $str3 = $str1.$str2;

// echo $str3;

// $str4 = "문자";
// $num1 = 1;
// $str5 = $str4.$num1; //int 숫자가 문자타입으로 변경됌.
// echo $str5;

// 상수 : 절대 변하지 않는 값 *이름은 무조건 대문자*
// define(" ", 값)
$num1 = 100;
define("NUM", 100);
define("STR", "스트링 타입"."".NUM);
echo NUM, STR, "\n";

var_dump(NUM === $num1);

echo 9223372036854775807; // php 최대 숫자
?>