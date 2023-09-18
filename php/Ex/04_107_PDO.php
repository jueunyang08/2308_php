<?php

$db_host = "localhost";
$db_user = "root";
$db_pw = "php504";
$db_db_name = "employees";
$db_charset = "utf8mb4";
$db_dns = "mysql:host=".$db_host.";dbname=".$db_db_name.";charset=".$db_charset;

$db_options = [
    // DB의 prepared Statement 기능을 사용하도록 설정
    PDO::ATTR_EMULATE_PREPARES          => false,
    // PDO Exception을 Throws하도록 설정
    PDO::ATTR_ERRMODE                   => PDO::ERRMODE_EXCEPTION,
    // 연상배열로 Fetch를 하도록 설정
    PDO::ATTR_DEFAULT_FETCH_MODE        => PDO::FETCH_ASSOC
];

//PDO class로 DB연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// // SQL 작성 :: 10004번 사원테이블의 사원정보를 출력해주세요.
// $sql =  " SELECT ".
//         " * ".
//         " FROM ".
//         " employees ".
//         " where ".
        // " emp_no = 10004 ";
        // "emp_no = :emp_no"; // 바로 값을 입력하는게 아니라, 변수에 값을 대입

// // prepared statement 셋팅
// $arr_ps = [
//     ":emp_no" => 10004,
// ];

// $stmt = $obj_conn -> prepare($sql); // prepared statement 생성
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt -> fetchAll(); // 쿼리 결과를 fetch

// print_r($result);

// -----------------------------
// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력

// $sql =  " SELECT ".
//         " s.salary, s.emp_no, e.birth_date ".
//         " FROM ".
//         " salaries s ".
//         " JOIN ".
//         " employees e ".
//         " ON ".
//         " s.emp_no = e.emp_no ".
//         " AND ".
//         " s.to_date = 99990101 ".
//         " WHERE ".
//         " e.emp_no = :emp_no1 or e.emp_no = :emp_no2 ";

// // prepared statement 셋팅
// $arr_ps = [
//     ":emp_no1" => 10001,
//     ":emp_no2" => 10002
// ]; 

// $stmt = $obj_conn -> prepare($sql); // prepared statement 생성
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt -> fetchAll(); // 쿼리 결과를 fetch

// print_r($result);

// -------------
// insert
// departments 부서번호 'd010', 부서명 'php504' 데이터 insert
// $sql = 
// " INSERT INTO departments ( ".
// " dept_no, ".
// " dept_name ".
// " ) ".
// " VALUES (".
// " :dept_no, ".
// " :dept_name ".
// " ) ";

// $arr_ps = [
//     ":dept_no" => "d010",
//     ":dept_name" => "php504"
// ];

// $stmt = $obj_conn -> prepare($sql);
// $result = $stmt -> execute($arr_ps);
// $obj_conn -> commit(); // 커밋 

// var_dump($result);
// $obj_conn = null;

// 부서번호 'd010' 삭제

$sql =
    " DELETE FROM ".
    " departments ".
    " WHERE ".
    " dept_no = :dept_no";

$arr_ps = [
    ":dept_no" => "d010"
];
        
$stmt = $obj_conn -> prepare($sql);
$result = $stmt -> execute($arr_ps);
$res_cnt = $stmt -> rowCount();
if($res_cnt >= 2) {
    $obj_conn -> rollBack(); // 롤백
    echo "rollback";
} else {
    $obj_conn -> commit(); // 커밋
    echo "commit";
}
        
var_dump($result);
$obj_conn = null; // DB 파기
        
