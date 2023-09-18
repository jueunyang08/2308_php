<?php

require_once("./04_107_fnc_db_connect.php");
$conn = null;

my_db_conn($conn);

// FLUSH PRIVILEGES; //DB에서 

// //SQL 1. 자신의 사원 정보를 employees 테이블에 등록해 주세요.
// $sql = 
// " INSERT INTO employees ( ".
// " emp_no, ".
// " birth_date, ".
// " first_name, ".
// " last_name, ".
// " gender, ".
// " hire_date ".
// " ) ".
// " VALUES ( ".
// " :emp_no, ".
// " :birth_date, ".
// " :first_name, ".
// " :last_name, ".
// " :gender, ".
// " :hire_date ".
// " ) ";

// $arr_ps = [
//     ":emp_no" => 500001,
//     ":birth_date" => 19970703,
//     ":first_name" => "Jueun",
//     ":last_name" => "yang",
//     ":gender" => "F",
//     ":hire_date" => 20230918
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
// // $result = $stmt -> fetchAll(); select 할때 연상 배열 
// $conn -> commit(); // 커밋 

// print_r($result);

// // db 파기
// db_destroy_conn($conn); // $conn의 정보를 파기
//-------------------------------------------------

// SQL 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.

// $sql = 
// " UPDATE ".
// " employees ".
// " SET ".
// " first_name='dully', ".
// " last_name='hoy' ".
// " WHERE ".
// " emp_no = :emp_no ";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
// // $result = $stmt -> fetchAll(); select 할때 연상 배열 
// $conn -> commit(); // 커밋 

// print_r($result);

// // db 파기
// db_destroy_conn($conn); // $conn의 정보를 파기

// ------------------------------------------
// SQL 3. 자신의 정보를 출력해 주세요.

// $sql = 
// " SELECT ".
// " * ".
// " FROM ".
// " employees ".
// " WHERE ".
// " emp_no = :emp_no";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // print_r로 출력하기위해 result 변수에 담음
// $result = $stmt -> fetchAll(); //select 할때 연상 배열 
// // $conn -> commit(); // 커밋 

// print_r($result);

// // db 파기
// db_destroy_conn($conn); // $conn의 정보를 파기

// -----------------------------------------

// SQL 4. 자신의 정보를 삭제해 주세요.

// $sql = 

// " DELETE FROM ".
// " employees ".
// " WHERE ".
// " emp_no = :emp_no";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn -> commit();

// db_destroy_conn($conn);
        


