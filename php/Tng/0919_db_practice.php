<?php

require_once("./04_107_db_learn_connect.php");
$conn = null;

db_conn($conn);


// 1.titles 테이블에 데이터가 없는 사원을 검색
$sql = 
" SELECT ".
" e.*, t.title, t.from_date, t.to_date ".
" FROM ".

" employees e ".
" left JOIN ".
" titles t ".
" ON ".
" e.emp_no = t.emp_no".
" WHERE ".
" t.title IS NULL";

$stmt = $conn->prepare($sql);
$result = $stmt->execute(); // print_r로 출력하기위해 result 변수에 담음
$result = $stmt->fetchAll(); //select 할때 연상 배열 

print_r($result);

// // db 파기
db_destroy_conn($conn); // $conn의 정보를 파기

db_conn($conn);
// 2. [1]번에 해당하는 사원의 직책 정보를 insert
// 2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101

foreach ($result as $val) {
  
$sql = 
" INSERT INTO ".
" titles ".
" VALUE ( ".
" :emp, ".
" :title, ".
" DATE(NOW()),".
" 99990101 ".
")";

$arr_ps = [
    ":title" => "green",
    ":emp" => $val["emp_no"]
];

 $stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
// $result = $stmt >fetchAll(); select 할때 연상 배열 
$conn -> commit(); // 커밋 
}

// db 파기
db_destroy_conn($conn); // $conn의 정보를 파기

// 3. 디비에 저장될것