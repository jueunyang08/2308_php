<?php

require_once("./04_107_fnc_db_connect.php");
$conn = null;

my_db_conn ($conn);

// SQL 작성 
$sql = "SELECT * FROM employees WHERE emp_no = :emp_no ";

// prepared Statment 셋팅
$arr_ps = [
    ":emp_no" => 10004
];

$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps);
$result = $stmt -> fetchAll();

print_r($result);

// db 파기
db_destroy_conn($conn);
// $conn = null;