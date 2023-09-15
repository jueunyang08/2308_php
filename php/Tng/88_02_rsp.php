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

while(true) {
echo "가위는 'S', 바위는 'R', 보는 'P'를 입력해주세요. 실행종료 'e'\n"."--------------------------------------\n";
$input = "";
$input=trim(fgets(STDIN));
$rand_num = rand(1,3);

if ($input == "s") {
	echo "입력값 : 가위\n";
	if ($rand_num == 1) {
		echo "무승부"."\n"."컴퓨터 : 가위";
	}
	else if ($rand_num == 2) {
		echo "패배"."\n"."컴퓨터 : 바위";
	}
	else if ($rand_num == 3) {
		echo "승리"."\n"."컴퓨터 : 보";
	}
}

else if ($input == "r") {
	echo "입력값 : 바위\n";
	if ($rand_num == 1) {
		echo "승리"."\n"."컴퓨터 : 가위";
	}
	else if ($rand_num == 2) {
		echo "무승부"."\n"."컴퓨터 : 바위";
	}
	else if ($rand_num == 3) {
		echo "패배"."\n"."컴퓨터 : 보";
	}
}
else if ($input == "p") {
	echo "입력값 : 보\n";
	if ($rand_num == 1) {
		echo "패배"."\n"."컴퓨터 : 가위";
	}
	else if ($rand_num == 2) {
		echo "승리"."\n"."컴퓨터 : 바위";
	}
	else if ($rand_num == 3) {
		echo "무승부"."\n"."컴퓨터 : 보";
	}
}

else if ($input == 'e') {
	break;
}
else {
	echo "에러\n";
}
}

// 숫자 맞추기 게임 
// 1. 1~100의 랜덤한 숫자를 맞추는 게임입니다.
//2. 총 5번의 기회를 제공합니다.
// 3. 입력한 숫자가 정답보다 클 경우 "더큼" 출력
// 4. 입력한 숫자가 정답보다 작을 경우 "더 작음" 출력
// 정답일 경우, "정답" 출력
// 5번의 기회를 다 썼을 경우 정답과 "실패"를 출력

rand(1,100);
for ($i=1;$i<=5;$i++)