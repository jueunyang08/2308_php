<?php

// 1. db_conn 이라는 함수를 만들어 주세요.
//      1-1. 기능 : db설정 및 pdo객체 생성


require_once("./04_107_db_learn_connect.php");
$conn = null;

db_conn($conn);

// FLUSH PRIVILEGES; //DB

// 2. 사원별 현재 급여를 조회하기

$sql = 
" SELECT ".
" * ".
" FROM ".
" salaries ".
" WHERE ".
" to_date = 99990101".
" AND ".
"salary >= :salary";

$arr_ps = 
[ ":salary" => 80000];


$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
$result = $stmt->fetchAll(); //select 할때 연상 배열 

// // print_r($result);

// // db 파기
db_destroy_conn($conn); // $conn의 정보를 파기

// 3. 조회한 데이터를 루프하면서 100,000이상이면 사원 번호 출력해주세요.

// foreach($result as $key => $item) {
//     if ($item["salary"] >= 100000) {
//         echo "emp_no = ".$item["emp_no"]."\n";
//     }   
// }

// count

// $sql = 
// "SELECT".
// " COUNT(*) '총' ".
// " FROM ".
// " salaries ".
// " WHERE ".
// " to_date = 99990101 ".
// " AND ".
// " salary >= :salary";

// $arr_ps = 
// [ ":salary" => 100000];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
// $result = $stmt->fetchAll(); //select 할때 연상 배열 
// // $conn->commit(); // 커밋 

// print_r($result);

// // db 파기
// db_destroy_conn($conn); // $conn의 정보를 파기

//----------------------------------------------
$i = 0;
foreach($result as $key => $item) {
    if ($item["salary"] >= 100000) {
        echo "emp_no = ".$item["emp_no"]."\n";

        $i++;
    }   
}

echo "\n"."count : ". $i;
