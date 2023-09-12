<?php
// while문 : 조건이 참이면 루프하는 문법
// $num = 2;
// $i = 0;
// while($i <= 8) {
// 	$i++;
// 	echo $num*$i,"\n";
	
// }

$i=1;
while(true) {
	$mul = 2*$i;
	echo "2 x {$i} = {$mul}\n";
	if($i === 9) {
		break;
	}
	$i++;
}

// do ~ while : 무조건 한번은 실행하고, 그다음부터 조건이 참이면 루프하는 문법
$i = 0;
do {
	
}
while($i<0);
