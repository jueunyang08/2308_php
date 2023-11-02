<?php

function db_conn(&$conn) {
    $db_host = "localhost";
    $db_user ="root";
    //   $db_pw = "php504";
      $db_pw = "1234";
    $db_db_name = "list";
    $db_charset ="utf8mb4";
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
    // 함수명        : db_destroy_conn
    // 기능          : DB destroy
    // 파라미터      : PDO    &$conn
    // 리턴          : 없음
    // ------------------------------------

    function db_list_select(&$conn, &$arr_param) {

        try {
            $sql =
            "SELECT 
            l_no, 
            title, 
            contents, 
            create_at, 
            update_at, 
            delete_at
            FROM list_table
            ORDER BY l_no DESC
            LIMIT :list_cnt
            OFFSET :offset
            ";

            $arr_ps = [
                ":list_cnt" => $arr_param["list_cnt"]
                ,":offset" => $arr_param["offset"]
            ];

            $stmt = $conn->prepare($sql);
            $stmt->execute($arr_ps);
            $result = $stmt->fetchAll();

            return $result; // 정상 : 쿼리 결과 리턴

        } catch(Exception $e) {
            return false; // 예외발생 : false 리턴
        }
    }

    function db_list_cnt(&$conn) {
        
        $sql =
        "SELECT COUNT(l_no) cnt 
        FROM list_table 
        WHERE delete_at IS NULL
        ";

       try {
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll();
            return (int)$result[0]["cnt"]; //정상 : 쿼리 결과 리턴
        }
        catch(Exception $e) {
            return false; // 예외발생 : false 리턴
        }
    }

    // insert 

    function db_insert(&$conn, &$arr_param) {
        $sql = 
        "INSERT INTO list_table
        (title, contents) 
        VALUE (:title, :contents) ";

        $arr_ps = [
            ":title" => $arr_param["title"],
            ":contents" => $arr_param["contents"]
        ];

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result; //정상 : 쿼리 결과 리턴
    }
    catch(Exception $e) {
        return false;  // 예외발생 : false 리턴
    }
    }


    
    // detail
    function db_select_inf(&$conn, &$arr_param) {

    $sql = 
    " SELECT 
    l_no, title, contents, create_at, update_at 
    FROM 
    list_table 
    where 
    b_no = :b_no
    AND
    delete_at IS null ";

    $arr_ps = [
        ":b_no" => $arr_param["b_no"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
    
        return $result; // 정상 : 쿼리 결과 리턴
    }
    catch(Exception $e) {
        echo $e->getMessage(); // Exception 
        return false; // 예외발생 : false 리턴
    }
    }
    