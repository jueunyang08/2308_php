<?php
// int : 숫자
$num = 1;
// string : 문자열
$str = 'ssssss';
// array : 배열
$arr = [1,2,3];
// double : 실수 
$double = 2.343;
// boolean : 논리형 데이터 타입 (참/거짓)
$bool = false;
// null
$obj = null;
// gettype() : 변수의 타입을 리턴
echo gettype($bool);

$num1 = 1;
$str1 = "1";
// 형변환 : 변수 앞에 (데이터타입) $num
echo $num1 + (string) $str1;





?>