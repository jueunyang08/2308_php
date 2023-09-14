<?php

// $in_str=fgets(STDIN);

// echo "입력값 : {$in_str}";

// $input = fgets(STDIN);
echo "가위는 S, 바위는 R, 보는 P를 입력해주세요.\n"."--------------------------------------\n";
$input=trim(fgets(STDIN));
$rand_num = rand(1,3);

switch($input) {
	case ($input=="s" && $rand_num == 1);
	echo "입력값 : 가위"."\n". "무승부"."\n"."컴퓨터 : 가위";
	break;	
	case ($input=="s" && $rand_num == 2);
	echo "입력값 : 가위"."\n"."패배"."\n"."컴퓨터 : 바위";
	break;
	case ($input=="s" && $rand_num == 3);
	echo "입력값 : 가위"."\n"."승리"."\n"."컴퓨터 : 보";
	break;

	case ($input=="r" && $rand_num == 1);
	echo "입력값 : 바위"."\n"."승리"."\n"."컴퓨터 : 가위";
	break;	
	case ($input=="r" && $rand_num == 2);
	echo "입력값 : 바위"."\n"."무승부"."\n"."컴퓨터 : 바위";
	break;
	case ($input=="r" && $rand_num == 3);
	echo "입력값 : 바위"."\n"."패배"."\n"."컴퓨터 : 보";
	break;

	case ($input=="p" && $rand_num == 1);
	echo "입력값 : 보"."\n"."패배"."\n"."컴퓨터 : 가위";
	break;	
	case ($input=="p" && $rand_num == 2);
	echo "입력값 : 보"."\n"."승리"."\n"."컴퓨터 : 바위";
	break;
	case ($input=="p" && $rand_num == 3);
	echo "입력값 : 보"."\n"."무승부"."\n"."컴퓨터 : 보";
	break;
}
