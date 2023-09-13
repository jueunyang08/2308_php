<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.

// function add(...$number){
//     $total = 0;
//     foreach($number as $value) {
//         $total += $value;
//     }
//     return $total;
// }

// echo add(1,2,3,4,5);

// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// 예) 3421 일 경우 3+4+2+1 해서 10이 리턴 되는 함수

function add($num) {
	$total = 0;
	$arr = str_split($num);
	return array_sum($arr);
	// foreach ($arr as $val) {
	// 	$total += $val;
	// }
	// return $total;
}
echo add("34215"),"\n";

// 문자열 수세기
$str = "hello";
echo "문자열수 : " .strlen($str), "\n";
//문자열 특정문자 치환
$str = "welcome to everdevel";
$change = str_replace('welcome','hello',$str);
echo $change;

