<?php
require_once("./04_107_fnc_db_connect.php");
$conn = null;

try {
    echo "try\n";
    // 실행하고 싶은 소스코드 작성
    my_db_conn ($conn);

// SQL 작성 
$sql = "SELEC * FROM employees WHERE emp_no = :emp_no ";

// prepared Statment 셋팅
$arr_ps = [
    ":emp_no" => 10004
];

$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps);
$result = $stmt -> fetchAll();
}
catch (Exception $e)
{
    // 예외가 발생 했을때 실행되는 소스코드를 작성
    echo "예외발생 : {$e -> getmessage()}\n";
}
finally {
    // 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드를 작성
    // db 파기
    db_destroy_conn($conn);
    echo "finally";
}