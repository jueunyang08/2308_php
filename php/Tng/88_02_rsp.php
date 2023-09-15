<?php

// $in_str=fgets(STDIN);
// echo "입력값 : {$in_str}";
// $input = fgets(STDIN);

//----------------------------------------------

// while (true) {
// 	echo "가위는 'S', 바위는 'R', 보는 'P'를 입력해주세요. 실행종료 'e' \n"."--------------------------------------\n";
// 	$input = "";
// 	$input=trim(fgets(STDIN));
// 	$rand_num = rand(1,3);
	
	
// 	switch($input) {
// 		case ($input=="s" && $rand_num == 1);
// 		echo "입력값 : 가위"."\n". "무승부"."\n"."컴퓨터 : 가위";
// 		break;	
// 		case ($input=="s" && $rand_num == 2);
// 		echo "입력값 : 가위"."\n"."패배"."\n"."컴퓨터 : 바위";
// 		break;
// 		case ($input=="s" && $rand_num == 3);
// 		echo "입력값 : 가위"."\n"."승리"."\n"."컴퓨터 : 보";
// 		break;
	
// 		case ($input=="r" && $rand_num == 1);
// 		echo "입력값 : 바위"."\n"."승리"."\n"."컴퓨터 : 가위";
// 		break;	
// 		case ($input=="r" && $rand_num == 2);
// 		echo "입력값 : 바위"."\n"."무승부"."\n"."컴퓨터 : 바위";
// 		break;
// 		case ($input=="r" && $rand_num == 3);
// 		echo "입력값 : 바위"."\n"."패배"."\n"."컴퓨터 : 보";
// 		break;
	
// 		case ($input=="p" && $rand_num == 1);
// 		echo "입력값 : 보"."\n"."패배"."\n"."컴퓨터 : 가위";
// 		break;	
// 		case ($input=="p" && $rand_num == 2);
// 		echo "입력값 : 보"."\n"."승리"."\n"."컴퓨터 : 바위";
// 		break;
// 		case ($input=="p" && $rand_num == 3);
// 		echo "입력값 : 보"."\n"."무승부"."\n"."컴퓨터 : 보";
// 		break;
// 	}
// if ($input=='e') {
// 	break;
// }
// }



// -------------------------------------------------

// while(true) {
// echo "가위는 'S', 바위는 'R', 보는 'P'를 입력해주세요. 실행종료 'e'\n"."--------------------------------------\n";
// $input = "";
// $input=trim(fgets(STDIN));
// $rand_num = rand(1,3);

// if ($input == "s") {
// 	echo "입력값 : 가위\n";
// 	if ($rand_num == 1) {
// 		echo "무승부"."\n"."컴퓨터 : 가위";
// 	}
// 	else if ($rand_num == 2) {
// 		echo "패배"."\n"."컴퓨터 : 바위";
// 	}
// 	else if ($rand_num == 3) {
// 		echo "승리"."\n"."컴퓨터 : 보";
// 	}
// }

// else if ($input == "r") {
// 	echo "입력값 : 바위\n";
// 	if ($rand_num == 1) {
// 		echo "승리"."\n"."컴퓨터 : 가위";
// 	}
// 	else if ($rand_num == 2) {
// 		echo "무승부"."\n"."컴퓨터 : 바위";
// 	}
// 	else if ($rand_num == 3) {
// 		echo "패배"."\n"."컴퓨터 : 보";
// 	}
// }
// else if ($input == "p") {
// 	echo "입력값 : 보\n";
// 	if ($rand_num == 1) {
// 		echo "패배"."\n"."컴퓨터 : 가위";
// 	}
// 	else if ($rand_num == 2) {
// 		echo "승리"."\n"."컴퓨터 : 바위";
// 	}
// 	else if ($rand_num == 3) {
// 		echo "무승부"."\n"."컴퓨터 : 보";
// 	}
// }

// else if ($input == 'e') {
// 	break;
// }
// else {
// 	echo "에러\n";
// }
// }

// 숫자 맞추기 게임 
// 1. 1~100의 랜덤한 숫자를 맞추는 게임입니다.
//2. 총 5번의 기회를 제공합니다.
// 3. 입력한 숫자가 정답보다 클 경우 "더큼" 출력
// 4. 입력한 숫자가 정답보다 작을 경우 "더 작음" 출력
// 정답일 경우, "정답" 출력
// 5번의 기회를 다 썼을 경우 정답과 "실패"를 출력


// echo "1~100의 랜덤한 숫자를 맞추는 게임입니다. \n". "숫자를 입력 하세요. : ";
// $rand_num = rand(1,100);

// for ($i=1;$i<=5;$i++) {
// 	$input = trim(fgets(STDIN));
// 	if(is_numeric($input)==FALSE) {
// 		echo "문자열 입니다\n";
// 		echo "1~100의 랜덤한 숫자를 맞추는 게임입니다. \n". "숫자를 입력 하세요. : ";
// 		$i--;
// 	}
// 	else if ($input>$rand_num) {
// 	echo "입력한 값 보다 더작음"."\n"."숫자를 입력 하세요. : ";
// 	}
// 	else if ($input<$rand_num) {
// 	echo "입력한 값 보다 더큼";
// 	}
// 	else if ($input==$rand_num) {
// 		echo "정답~~~";
// 	}
// 	if($i==5) {
// 	echo "\n기회 끝 정답 : {$rand_num}";
// 	}
// }
	// 1.반복문을 이용하여 숫자를 1~10까지 출력해주세요.
	// 2.구구단 8단을 출력해 주세요.
	// 3.19단을 출력해 주세요.
	// 4.두 숫자를 더해주는 함수를 만들어 주세요.
	// 5.짜장면이면 중식, 비빔면이면 한식, 그외 양식으로 출력해주세요.

	// ----------1
	for($i=1;$i<=10;$i++) {
		echo $i;
	}
	//------------2
	$num = 8;
	for ($i=1; $i<=9; $i++) {
		$total = $num*$i;
	echo "\n{$num} * {$i} = {$total}\n";
	}
	//-----------3
	$num = 19;
	for ($i=1; $i<=9; $i++) {
		$total = $num*$i;
	echo "\n{$num} * {$i} = {$total}\n";
	}
	// -----------4
	function sum($num1, $num2) {
		$sum = $num1+$num2;

		echo $sum;
	}

	echo sum(5, 6);

	echo "\n";
	// -----------5

	$input = "비빔밥";
	switch($input) {
		case "짜장면" : 
			echo "중식";
			break;
		case "비빔밥" : 
			echo "한식";
			break;
		default : echo "양식";
			break;
	}
