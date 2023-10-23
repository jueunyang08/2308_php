<?php

// $arr = [5,10,1,2,9,47];
// asort($arr);

// foreach($arr as $val) {
//     if()
// }

// print_r($arr);

// $arr = ['a', 'b', 'c', 'd','e'];

// $cnt = count($arr);
// $i = $cnt-1;


// echo $cnt;
// $num = 19;

// for($i=1; $i<=9; $i++) {
//     echo $num."*".$i."=".$num*$i."\n";
// }

$file = fopen("19.txt", "a");

for($i=1;$i<=19;$i++) {

    fputs($file, $i . "단" . "\n"); // 파일에 작성
    for($j=1;$j<=19;$j++) {
    fputs($file, $i." x ".$j." = ".$i*$j."\n");
    }
};


// $fp = fopen("19.txt", 'a');
// fwrite($fp, $str);