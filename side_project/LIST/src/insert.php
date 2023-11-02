<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "parameter Error : %s"); //파라미터 에러 메세지
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리


$arr_post = $_POST;
// DB connect
$conn = null;
$arr_err_msg =[];
$title = "";
$contents = "";


// GET은 보안상 좋지않아 POST로 통신 insert값을 보낸다.

// POST로 request가 왔을때 처리
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인

if($http_method === "POST") {
    try {
        // 파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 세팅
        $contents = isset($_POST["contents"]) ? trim($_POST["contents"]) : ""; // content 세팅

        if($title === "") {
            $arr_err_msg[] = sprintf("제목을 입력하세요");
        }
        if($contents === "") {
            $arr_err_msg[] = sprintf("내용을 입력하세요");
        }
        if(count($arr_err_msg) === 0) {

         // DB 접속
         if (!db_conn($conn)) {
            // DB instance 에러
            throw new Exception("DB Error : PDO instance"); 
        }
        // 글작성은 > DB insert 기존에 있는 데이터를 삭제 업데이트 갱신 할때는 트랜잭션 시작
        $conn->beginTransaction(); // 트랜잭션 시작

        // insert

        //정상적으로 처리가 되지 않을때 throw
        if(!db_insert($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards"); 
        }

        $conn->commit(); // 모든 처리 완료시 커밋

        // 리스트 페이지로 이동
        header("Location: main.php"); // 
        exit;
    }
    }
    catch(Exception $e) {
        $conn->rollback();
        echo $e->getMessage(); // Exception 메세지 출력
        exit;
    }
    finally {
        db_destroy_conn($conn); //DB 파기
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
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
            <form id='frm_textArea' name='frm_textArea' action="/LIST/src/insert.php" method="post">
                <div class= 'content_section'>
               
                    <!-- 제목 -->
                    <input id= "title" name="title" class='insert_title w_title' type="text" maxlength='16' placeholder='제목을 입력하세요' value="<?php echo $title; ?>">
                    <!-- 내용 -->
                    <textarea name="contents" id="contents" onkeyup="fn_checkByte(this)" class='insert_content w_content inner_content scroll_box' cols="30" rows="10" placeholder='내용을 입력하세요'><?php echo $contents; ?></textarea>
                    <sup>(<span id='nowByte'>0</span>/300bytes)</sup>
                </div>
            
                <!-- 페이지 푸터 영역 -->
                <div class='page_footer_section'>
                    <!-- 취소 버튼 -->
                    <button type='button' class='footer_position c_w_btn cursor' onclick="location.href='/LIST/src/main.php'">취소</button>
                    <!-- 작성 버튼 -->
                    <button type='submit' class='footer_position c_w_btn w_btn cursor'>작성</button>
                </div>
                <?php
                foreach($arr_err_msg as $val) {
                ?>
                <p class="err_msg"><?php echo $val ?></p>
                <?php
                }
                ?>
            </form>
        </div>
    </main>

    <script src ='list.js'></script>
</body>

</html>
