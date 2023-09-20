<?php

function db_conn( &$conn ) { //레퍼런스 파라미터 
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "php504";
    $db_db_name = "mini_board";
    $db_charset = "utf8mb4";
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_db_name.";charset=".$db_charset;
    try {
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
        return true;
    } catch(Exception $e) {
        return false;
    }
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

        // ------------------------------------
    // 함수명        : db_select_board_paging
    // 기능          : board paging 조회
    // 파라미터      : PDO    &$conn
    // 리턴          : array / false
    // ------------------------------------
    function db_select_board_paging(&$conn) {
   
    try {
        $sql = 
        " SELECT "
        ."      b_no "
        ."      ,title "
        ."      ,b_date "
        ." FROM "
        ."      board "
        ." ORDER BY "
        ."      b_no DESC "
        ;

        $arr_ps = [];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();

        return $result; // 정상 : 쿼리 결과 리턴

    } catch(Exception $e) {
        return false; // 예외발생 : false 리턴

    }
}