<?php
// ************************************
// 파일명   :04_107_fnc_db_connect.php
// 기능     : DB 연동 관련 함수
// 버전     : v001 /new/ Yang.je 230918
//            v002 /DB conn 설정 변경/ Yang.je 230918
// ************************************

// ------------------------------------
// 함수명        : my_db_conn
// 기능          : DB Connect
// 파라미터      : PDO    &$conn
// 리턴          : 없음
// ------------------------------------

function my_db_conn( &$conn ) { //레퍼런스 파라미터 
$db_host = "localhost"; // host // del v001 /OR/ add v002
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
$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

// ------------------------------------
// 함수명        : db_destroy_conn
// 기능          : DB destroy
// 파라미터      : PDO    &$conn
// 리턴          : 없음
// ------------------------------------

function db_destroy_conn(&$conn) {
    $conn = null;
}