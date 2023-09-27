<?php

// $i = 0;
// while(true) {
//     $i++;

//     if($i==5) {
//         echo $i;
//         break;
//        if($i<=5) {
//         echo $i;
//        }
    
//     }
//     echo $i."\n";
// }


$i=0;
$s=5;
while($i<=6) {
    $i++;
    $star=1;
 
    while($s>$i) {
        $s--;
        echo " ";
    }

    while($i>=$star) {
    $star++;
        echo "*";
    }
    echo "\n";
}