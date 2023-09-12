<?php

// // trin() : 문자열의 공백을 없애주는 함수
// echo " fdfdf ", "\n", trim("  dfdf   ");

// // strtoupper(), strtolower() 대소문자 변경
// echo strtoupper("dfdfdfd"), strtolower("GEFEFE");
// // strlen mb_strlen 멀티바이트 문자열의 길이를 반환 
// echo mb_strlen("가나다");
// // str_replace(); 특정 문자를 치환해주는함수
// echo str_replace("key : ", "", "key:423jgdsfeffe");

// //substr() : 문자열을 자르는 함수 
// echo mb_substr("가나다라마바사",1, 4);

// //strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
// echo strpos("abcffdf", "d");

// isset () : 변수의 존재를 확인하는 함수
$str = null;
var_dump(isset($sfdfsdf));

// empty() : 변수의 값이 비어있는지 확인하는 함수
var_dump(empty($str));

$num=1;
// settype 아예 데이터 타입이 바뀌는 함수
settype($num, "string");
(string)$num;
echo gettype($num);

//time() : 1970/01/01 일 기준으로 타임스탬프(초단위) 시간 확인하는 함수
echo time();
echo date("Y-m-d H:i:s", time() - (60*60*24*30));

//date() :원하는 형식으로 시간 표시