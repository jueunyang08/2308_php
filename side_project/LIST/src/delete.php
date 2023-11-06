<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

try{
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
        $l_No = isset($_GET{"l_No"}) ? $_GET["l_No"] : "";
        $page_num = isset($_GET{"page"}) ? $_GET["page"] : "";
        $arr_err_msg = [];
        if($l_No === "") {
            $arr_err_msg[] = "Parameter Error : l_no";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }
    
        // 3-1-2. 게시글 정보 획득
        $arr_param = [
            "l_No" => $l_No
        ];

        $result = db_select_pk($conn, $arr_param);

        // 3-1-3. 예외 처리
        if($result === false) {
            throw new Exception("DB Error : Select l_no");
        } else if(!(count($result) === 1)) {
            throw new Exception("DB Error : Select l_no Count");
        }
        $item = $result[0];
    }
    // 3-2. POST일 경우 (삭제 페이지의 동의 버튼 클릭)
    else {
        // 3-2-1. 파라미터에서 id 획득
        $l_No = isset($_POST["l_No"]) ? $_POST["l_No"] : "";
        $arr_err_msg = [];
        if($l_No === "") {
            $arr_err_msg[] = "Parameter Error : l_no";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        // 3-2-2. 트랜잭션 시작
        $conn->beginTransaction();

        // 3-2-3. 게시글 정보 삭제
        $arr_param = [
            "l_No" => $l_No
        ];
        // 3-2-4. 예외 처리
        if(!db_delete($conn, $arr_param)) {
            throw new Exception("DB Error : Delete Boards id");
        } 

        $conn->commit(); // commit
        header("Location: main.php"); // 리스트 페이지로 이동
        exit; // 처리 종료
    }
}
catch(Exception $e) {
// POST 일 경우에만 rollback
    if($http_method === "POST") {
        $conn->rollback();
    }
    echo $e->getMessage(); // 에러 메세지 출력
    exit; // 처리종료
}
finally {
    db_destroy_conn($conn); // DB 파기
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
    <link rel="stylesheet" href="/LIST/src/css/list.css">
</head>
<body>
    <!-- 공통 메인 -->
    <main>
        <div class= 'main_div center'>
            <!-- 헤더파일 -->
            <?php
            require_once(FILE_HEADER);
            ?>
            <!-- 컨텐츠 영역 -->
           
            <div class= 'content_section'>

            <form action="/LIST/src/delete.php" method="post">
            <input type="hidden" name="l_No" value="<?php echo $l_No; ?>">
            <div class= 'detail_title_section'>
                <div class='l_no'><?php echo $item["l_No"]; ?></div>
                <p class="detail_title"><?php echo $item["title"]; ?></p>
            </div>

            <div class='detail_content_section'>
                <div class='scroll_box'>
                    <div class='detail_content'>
                    <?php echo $item["contents"]; ?>
                    </div>
                </div>
                <div class='detail_date'>
                    <!-- 수정일 -->
                    <p class='date_CSS'>수정일 <?php echo $item["update_at"]; ?></p>
                    <!-- 작성일 -->
                    <p class='date_CSS'>작성일 <?php echo $item["create_at"]; ?></p> 
                </div>
            </div>
        
            <!-- 페이지 푸터 영역 -->
            <div class='page_footer_section'>
                <!-- 뒤로가기 버튼 -->
                <button type='button' class='btn_CSS prev_btn footer_position cursor' onclick="location.href='/LIST/src/main.php'"></button>
                <!-- 수정 버튼 -->
                <button type='button' class='btn_CSS update_btn footer_position cursor' onclick="location.href='/LIST/src/update.php'"></button>
                <!-- 삭제 버튼 -->
                <button type='submit' class='btn_CSS delete_btn footer_position cursor' onclick="return deLete()"></button>
            </form>

            </div>
        </div>
    </main>
    <script src="../js/list.js"></script>
</body>
</html>