<?php

// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상 3등이면 동상 4등이면 장려상 그외 노력상

$rank = 1;
$award = "";

// switch($str){
// 	case "1등": 
// 	echo "금상";
// 	break;

// 	case "2등": 
// 	echo "은상";
// 	break;

// 	case "3등": 
// 	echo "동상";
// 	break;

// 	case "4등": 
// 	echo "장려상";
// 	break;

// 	default :
// 	echo "노력상";
// 	break;
// }

if($rank === 1){
	$award = "금상";
}
else if($rank === 2){
	$award = "은상";
}
else if($rank === 3){
	$award = "금상";
}
else if($rank === 4){
	$award = "장려상";
}
else if($rank){
	$award = "노력상";
}
echo $award;