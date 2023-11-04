<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "parameter Error : %s"); //파라미터 에러 메세지
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

// DB 
$conn = null; 

//Method 확인
$http_method = $_SERVER["REQUEST_METHOD"]; 

$arr_err_msg =[];

try {
    // DB 접속
    if (!db_conn($conn)) {
        // DB instance 에러
        throw new Exception("DB Error : PDO instance"); 
    }
    
    if($http_method === "GET") {
        // GET Method 의 경우

        $l_No = isset($_GET["l_No"]) ? $_GET["l_No"] : ""; // l_no
        $page_num = isset($_GET["page"]) ? $_GET["page"] : ""; //page 셋팅
        
        if($l_No === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "l_No");
        }
        if($page_num === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용을 입력 하세요");
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }
    }
    else {

        // POST Method 의 경우
        // 게시글 수정을 위해 파라미터 세팅

        $l_No = isset($_POST["l_No"]) ? $_POST["l_No"] : ""; // id 셋팅
        $page_num = isset($_POST["page"]) ? $_POST["page"] : ""; //page 셋팅
        $title = trim(isset($_POST["title"]) ? $_POST["title"] : ""); // title 셋팅
        $contents = trim(isset($_POST["contents"]) ? $_POST["contents"] : ""); //content 세팅

        if($l_No === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "l_No");
        }
        if($page_num === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page_num");
        }
        // id, page가 없을 경우 (예외처리)
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목을 입력 하세요");
        }
        if($contents === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용을 입력 하세요");
        }
        // title, content가 없을 경우(처리속행)
        
        if(count($arr_err_msg) === 0) {

            // 게시글 수정을 위해 파라미터 세팅
            $arr_param = [
                "l_No" => $l_No
                ,"title" => $title
                ,"contents" => $contents
            ];

            // 게시글 수정 처리 

            $conn->beginTransaction(); // 트랜잭션 시작

            if(!db_update($conn, $arr_param)) {
                throw new Exception("DB Error : update ");
            }
            $conn->commit(); // commit
            // 페이지 이동
            header("Location: detail.php/?l_No={$l_No}&page={$page_num}"); // 디테일 페이지로 이동 
            exit;
        }
    }
    // 게시글 데이터 조회를 위한 파라미터 세팅
    $arr_param = [
        "l_No" => $l_No
    ];
    // 게시글 데이터 조회
    $result = db_select_pk($conn, $arr_param);
    //게시글 조회 예외처리
    if($result === false) {
        // 게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");
    }
    else if(!(count($result) === 1)) {
        // 게시글 조회 count 에러
        throw new Exception("DB Error : PDO Select_id Count.".count($result)); 
    }
    $item = $result[0];

}
catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollback(); // rollback
    }
    echo $e->getMessage(); // Exception 메세지 출력
    // header("Location: error.php/?err_msg={$e->getmessage()}"); // error 메세지 출력 (error.php)
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
    <title>수정페이지</title>
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

                    <form action="/LIST/src/update.php" method="post">
                    <input type="hidden" name="l_No" value="<?php echo $l_No?>">
                    <input type="hidden" name="page" value="<?php echo $page_num?>">
                        <div class= 'detail_title_section'>

                            <div class='l_no' style="margin-top:12px"><?php echo $item["l_No"]; ?></div>
                            <input type="text" class="update_input_title" name="title" value="<?php echo $item["title"]; ?>">
                        </div>

                        <div class='detail_content_section'>
                            <div class='scroll_box'>
                                <div class='detail_content'>
                                <textarea name="contents" id="contents" class='update_input_contents inner_content scroll_box update_input_focus ' cols="30" rows="10" ><?php echo $item["contents"]; ?></textarea>
                                </div>
                            </div>
                            
                        </div>
                    
                        <!-- 페이지 푸터 영역 -->
                        <div class='page_footer_section'>
                        <button class="footer_position c_w_btn w_btn cursor" style="font-size:17px;width:80px" type="submit">수정확인</button>  
                        <button type="button" class="footer_position c_w_btn cursor" style="font-size:17px;width:80px" onclick="location.href='/LIST/src/detail.php/?page=<?php echo $page_num; ?>&l_No=<?php echo $l_No; ?>'">수정취소</button>
                    </form>
                </div> 
            <!-- 컨텐츠 영역 끝 -->
        </div>
    </main>
    <script src="../js/list.js"></script>
</body>
</html>