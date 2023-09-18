<?php

// 두 숫자를 받아서 더해주는 함수를 만들어보자.
// 리턴이 없는 함수

// function my_sum($a, $b) {
// 	echo $a +$b; 
// }
// my_sum(5, 5);

// // 리턴이 있는 함수
// function my_sum2($a, $b) {
// // 	return $a+$b;
// // }
// // echo my_sum2(1,2);

// // 두수를 받아서 -* / % 를 리턴하는 함수를 만들어 주세요

// function my_sub($a, $b) {

// 	return $a - $b;
// }
// $reslt = my_sub(5, 3);
// echo $reslt, "\n";

// function my_mul($a, $b) {

// 	return $a * $b;
// }
// echo my_mul(5, 3), "\n";

// function my_div($a, $b) {

// 	return $a / $b;
// }
// echo my_div(5, 1), "\n";

// function my_rem($a, $b) {
// 	return $a % $b;
// }
// echo my_rem(5, 3), "\n";

// // 파라미터의 기본값이 설정되어있는 함수
// // 받는값은 무조건 앞에, 기본값 세팅은 뒤에  
// function my_sum3($a, $b = 5){
// 	return $a + $b;
// }
// echo my_sum3(3);

//가변 파라미터 
// php 5.6이상 사용가능
// function my_args_papram(...$items) {
// echo $items[0],$items[1];
// }
// my_args_papram ("a", "b","c");
// php 5.5 이하에서 사용방법
// function my_args_papram() {
// $items = func_get_args();
// print_r($items); }

// 재귀 함수
// 1+2+3 .....+10000

// for 반복문
// function my_ap($i) {

// $sum = 0;
// for($i; $i>0; $i--) {
// 	$sum += $i;
// }
// return $sum;
// }
// echo my_ap(10000);

// 재귀함수
// function my_recursion($i) {
// 	if($i === 0) {
// 		return 0;
// 	}
	
// 	return $i + my_recursion($i - 1);
// }
// echo my_recursion(1);


// 1부터 무한 수 까지 입력한 값 더하기

// function add($i) {
// 	$total = 0;
// 	for($i;$i>0;$i--){

// 	$total += $i;}

// 	return $total;
// }
// echo add(7);

//  레퍼런스 파라미터

function test1( $str ) {
	$str = "함수 test1";
	return $str;
}
function test2( &$str ) {
	$str = "함수 test2";
	return $str;
}

$str = "???";
$result = test2($str);
echo $str, "\n";
echo $result;