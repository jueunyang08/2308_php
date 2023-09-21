<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

//POST로 request가 왔을때 처리
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST") {
    try {
        $arr_post = $_POST;
        // DB connect
        $conn = null;


        // DB 접속
        if (!db_conn($conn)) {
            // DB instance 에러
            throw new Exception("DB Error : PDO instance"); 
        }
        $conn->beginTransaction(); // 트랜잭션 시작

        // insert
        if(!db_insert_board($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards"); 
        }

        $conn->commit(); // 모든 처리 완료시 커밋

        // 리스트 페이지로 이동
        header("Location: list.php"); // 
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage(); // Exception 메세지 출력
        exit;
    } finally {
        db_destroy_conn($conn); //DB 파기
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
    require_once(FILE_HEADER);
    ?>
    
    <form action="/mini_board/src/insert.php" method="post">
    <ul>
        <li>
            <label for="title">제목</label>
             <input type="text" name="title" id = title size = 48>
        </li>

        <li>
             <label for="contents">내용</label>
            <textarea name="contents" id="contents" cols="50" rows="10" placeholder="내용을 입력하세요".></textarea>
        </li>
    </ul>
    
    <button type="submit"> 작성 </button>
    <a href="/mini_board/src/list.php"> 취소 </a>
</form>

</body>
</html>