<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

$conn = null; // DB connect

$page_num = $_GET["page"];
try {

    // DB 접속
    if (!db_conn($conn)) {
        // DB Instance 에러
        //아규먼트로 에러 메세지를 출력
        throw new Exception("DB Error : PDO instance"); // 강제 예외 발생 : DB Instance
    }

    $l_No = "";
    
    

    if(!isset($_GET["l_No"]) || $_GET["l_No"] === "") {
        throw new Exception("Parameter ERROR : No l_no"); // 강제 예외 발생 :
    }
    // l_no (pk) 확인
    $l_No = $_GET["l_No"]; // id 셋팅

    $arr_param = [
        "l_No" => $l_No
    ];

    // pk 를 이용하여 게시글 데이터 조회
    $result = db_select_inf($conn, $arr_param);


    // 게시글 조회 예외 처리
    if(!$result) {
        //게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");

    } else if( !(count($result) === 1) ) {
        // 게시글 조회 count 에러 
        throw new Exception("DB Error : PDO Select_id count, ".count($result));
    }

    $item = $result[0];

}
catch(Exception $e) {
    echo $e->getMessage();
    exit;
}
finally {
    db_destroy_conn($conn); //DB 파기
}

$input_l_no = $_GET["l_No"];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
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
                <button class='btn_CSS prev_btn footer_position cursor' onclick="location.href='/LIST/src/main.php/?page=<?php echo $page_num; ?>'"></button>
                <!-- 수정 버튼 -->
                <button class='btn_CSS update_btn footer_position cursor' onclick="location.href='/LIST/src/update.php/?page=<?php echo $page_num; ?>&l_No=<?php echo $l_No; ?>'"></button>
                <!-- 삭제 버튼 -->
                <button id='deleteID' class='btn_CSS delete_btn footer_position cursor' onclick="location.href='/LIST/src/delete.php/?page=<?php echo $page_num; ?>&l_No=<?php echo $l_No ?>'"></button>
            </div>
        </div>
    </main>
    <script src="../js/list.js"></script>
</body>
</html>
