<?php
// 1. 설정 정보
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

try {
    // 2. DB 연결
    // 2-1. connection 함수 호출
    $conn = null; // PDO 객체 저장용 변수
    if(!db_conn($conn)) {
        throw new Exception("DB:Error : PDO instance");
    }

    $http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인

     // 3-1. GET 일 경우 (상세 페이지의 삭제 버튼 클릭) 
    if($http_method === "GET") {
        // 3-1-1. 파라미터에서 id, page 획득
        $b_no = isset($_GET{"b_no"}) ? $_GET["b_no"] : "";
        $page_num = isset($_GET{"page"}) ? $_GET["page"] : "";
        $arr_err_msg = [];
        if($b_no === "") {
            $arr_err_msg[] = "Parameter Error : b_no";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }
    
        // 3-1-2. 게시글 정보 획득
        $arr_param = [
            "b_no" => $b_no
        ];
        $result = db_select_boards_b_no($conn, $arr_param);

        // 3-1-3. 예외 처리
        if($result === false) {
            throw new Exception("DB Error : Select b_no");
        } else if(!(count($result) === 1)) {
            throw new Exception("DB Error : Select b_no Count");
        }
        $item = $result[0];
    }
    // 3-2. POST일 경우 (삭제 페이지의 동의 버튼 클릭)
    else {
        // 3-2-1. 파라미터에서 id 획득
        $b_no = isset($_POST["b_no"]) ? $_POST["b_no"] : "";
        $arr_err_msg = [];
        if($b_no === "") {
            $arr_err_msg[] = "Parameter Error : b_no";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        // 3-2-2. 트랜잭션 시작
        $conn->beginTransaction();

        // 3-2-3. 게시글 정보 삭제
        $arr_param = [
            "b_no" => $b_no
        ];
        // 3-2-4. 예외 처리
        if(!db_delete_boards_b_no($conn, $arr_param)) {
            throw new Exception("DB Error : Delete Boards id");
        } 

        $conn->commit(); // commit
        header("Location: list.php"); // 리스트 페이지로 이동
        exit; // 처리 종료
    }
}
catch(Exception $e) {
    // POST 일 경우에만 rollback
    if($http_method === "POST") {
        $conn->rollback();
    }
    // echo $e->getMessage(); // 에러 메세지 출력
    header("Location: error.php/?err_msg={$e->getmessage()}"); // error 메세지 출력 (error.php)
    exit; // 처리종료
}
finally {
    db_destroy_conn($conn);
}




?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>삭제 페이지</title>
</head>
<body>
    <?php
     require_once(FILE_HEADER);
    ?>
    <div class = delete_main>
        <p>삭제하면 영구적으로 복구 할 수 없습니다.</p>
        <p>정말로 <span class=red>삭제</span>하시겠습니까?</p>
            <!-- <table>
                <caption> 
            <br>
            <br>
            </caption> -->
            <!-- <tr>
                <th>게시글 번호</th>
                <td><?php echo $item["b_no"] ?></td>
            </tr>
            <tr>
                <th>작성일</th>
                <td><?php echo $item["b_date"] ?></td>
            </tr>

            <tr>
                <th>제목</th>
                <td><?php echo $item["title"] ?></td>
            </tr>

            <tr>
                <th>내용</th>
                <td><?php echo $item["contents"] ?></td>
            </tr> -->
            <!-- </table> -->
        </div class = delete_main>
        <section>
            <form action="/mini_board/src/delete.php" method="post">
                <input type="hidden" name="b_no" value="<?php echo $b_no; ?>">
                
                <button class=delete_button><a class=cancel_button href="/mini_board/src/detail.php/?b_no=<?php echo $b_no; ?>&page=<?php echo $page_num; ?>">취소</a></button>
                <button class="red delete_button cursor" type="submit">삭제</button>
            </form>
        </section>
</body>
</html>