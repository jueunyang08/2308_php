<?php
// for 문
// for(시작; 조건; 증가/증감 연산자) { 반복하고싶은처리 }

// for($i=0; $i <= 2; $i+=2){
// 	echo "안녕하세요 \n";
// }

// 1~10까지 숫자출력

// for($i=1; $i<=10; $i++){
// 	echo $i, "\n";
// }

// 구구단 2단을 반복문을 이용해서 작성해주세요.
// 2x1 = 2

// ---------------------------------------
// $num = 2;
// for($i=1; $i<=9; $i++){
// 	if($i === 2) {
// 		continue;
// 	}
// 	echo "{$num} x {$i} = ", $num*$i, "\n";
	// break;
// }
// ---------------------------------------

// break : for문을 종료하고 빠져나오는 문법;
// continue : continue아래에 있는 처리를 실행하지않고 다음루프로 진행

// 이중루프

// ---------------------------------------

// for ($i=0; $i<=1; $i++) {
// 	for($z=9; $z>=8; $z--) {
// 		echo "{$i},,,,,{$z}\n";
// 	}
// }
// ---------------------------------------

// 1
// 0
// 1
// 1
// 1
// 2
// 상위I
// 하위Z 하위Z 하위Z
// for($i = 1; $i <=1; $i++) {
	
// 	for($z = 0; $z<=2; $z++) {
// 		echo $i, $z;
// 	}
// }

// ---------------------------------------
// for($i=1; $i<=9; $i++) {
// 	// 2단에서 8단안나오게
// 	// if($i>=2 && $i<=8) {
// 	// 	continue;
// 	// }

// 	// 짝수 단만 나오게
// 	if($i%2==1){
// 		continue;
// 	}
// 	echo "{$i}단\n";
// 	for($n=1; $n<=9; $n++) {

// 		$total = $i*$n;
// 		echo "{$i} * {$n} = {$total} \n";
// 	}
// }
// ---------------------------------------

// for($i=1; $i<=9; $i++) {
// 	echo "{$i}단 \n";

// 	for($n=1; $n<=9; $n++) {
// 		$total = $i*$n;
// 		echo "{$i} * {$n} = {$total} \n";
// 	}
// }

//  //* ** ***

//  for($i=1; $i<=5; $i++) {
// 	for($s=1;$s<=5;$s++) {
// 		if($s<=$i) {
// 			echo "*";
// 		}
// 	}
// 	echo "\n";
//  }
// $int_line = 1;
//  while ($int_line <= 5) {
// 	$int_star = 1;
// 	while($int_star<=$int_line) {
// 		echo "*";
// 		$int_star++;
// 	}
// 	echo "\n";
// 	$int_line++;
//  }


//----------------------
//    *
//   **
//  ***
// ****
//*****
//  for($i=1; $i<=5; $i++) {
// 	for($s=5; $s>=1; $s--) {
// 		if($s>$i) {
// 			echo " ";
// 		}
// 		else {
// 			echo "*";
// 		}
// 	}
// 	echo "\n";
//  }


 //------------------------------
 $num=5;
 for($x=1; $x<=$num; $x++){
	for($y=$num-$x; $y>=1; $y--) {
		echo " ";
	}
	for($z=1; $z <= 2*$x -1; $z++) {
		echo "*";
	}
	echo "\n";
 }


