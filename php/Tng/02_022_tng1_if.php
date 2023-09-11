<?php
//if 
$num = -10;
$str = "당신의 점수는 {$num}점 입니다.";

if($num >= 0 && $num <= 100) {
	if($num>=100) {
		// echo $str, "<A+>";
		$grade = "A+";
	}
	else if($num>=90) {
		// echo $str, "<A>";
		$grade = "A";
	}
	else if($num>=80) {
		// echo $str, "<B>";
		$grade = "B";
	}
	else if($num>=70) {
		// echo $str, "<C>";
		$grade = "C";
	}
	else if($num>=60) {
		// echo $str, "<D>";
		$grade = "D";
	}
	else if($num<60) {
		// echo $str, "<F>";
		$grade = "F";
	}
	echo "당신의 점수는 {$num}점 입니다. {$grade}";
}
else echo "아님";
