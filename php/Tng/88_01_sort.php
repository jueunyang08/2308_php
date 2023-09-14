<?php

//버블 정렬
// $arr = [ 5, 34, 3, 2, 6, 7, 3, 12];

// arsort($arr);
// print_r($arr);

$arr = [30,15,21,4,5,8,17];
$count = count($arr);
// $tmp = $arr[0];
// $arr[0] = $arr[1];
// $arr[1] = $tmp;



for ($a=1; $a<=$count; $a++) {
	for ($b=0; $b<=$count-2; $b++) {
		if($arr[$b]>$arr[$b+1]) {
			$tmp = $arr[$b];
			$arr[$b] = $arr[$b+1];
			$arr[$b+1]=$tmp;
		}
	}
}
print_r($arr);
