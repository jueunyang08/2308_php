<?php
//특정 값을 비교할때만 사용하는 조건문
// 값이 고정되어있는경우 if문 대신 사용할수 있다.

$food = "마파두부";

switch($food) {
	case "김밥":
		echo "한식";
		break;
	
	case "마파두부":
		echo "중식";
		break;
	default:
		echo "기타";
		break;
}