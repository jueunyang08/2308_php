<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "parameter Error : %s"); //파라미터 에러 메세지
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리


$conn = null; // DB 접속
// $b_no = isset($_GET["b_no"]) ? $_GET["b_no"] : $_POST["b_no"]; // id 세팅
// $page_num = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; //id 세팅
$http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인

$arr_err_msg =[];
// $title = "";
// $contents ="";

try {


     // DB 접속
     if (!db_conn($conn)) {
        // DB instance 에러
        throw new Exception("DB Error : PDO instance"); 
    }

    
    if($http_method === "GET") {
        // GET Method 의 경우

        
        $b_no = isset($_GET["b_no"]) ? $_GET["b_no"] : ""; // id 셋팅
        $page_num = isset($_GET["page"]) ? $_GET["page"] : ""; //page 셋팅
        
        if($b_no === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
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

        $b_no = isset($_POST["b_no"]) ? $_POST["b_no"] : ""; // id 셋팅
        $page_num = isset($_POST["page"]) ? $_POST["page"] : ""; //page 셋팅
        $title = trim(isset($_POST["title"]) ? $_POST["title"] : ""); // title 셋팅
        $contents = trim(isset($_POST["contents"]) ? $_POST["contents"] : ""); //content 세팅

        if($b_no === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "b_no");
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
                "b_no" => $b_no
                ,"title" => $title
                ,"contents" => $contents
            ];

            // 게시글 수정 처리 

            $conn->beginTransaction(); // 트랜잭션 시작

            if(!db_update_boards_b_no($conn, $arr_param)) {
                throw new Exception("DB Error : update_boards_id");
            }
            $conn->commit(); // commit
            // 페이지 이동
            header("Location: detail.php/?b_no={$b_no}&page={$page_num}"); // 디테일 페이지로 이동 
            exit;
        }
    }
    // 게시글 데이터 조회를 위한 파라미터 세팅
    $arr_param = [
        "b_no" => $b_no
    ];
    // 게시글 데이터 조회
    $result = db_select_boards_b_no($conn, $arr_param);
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
    // echo $e->getMessage(); // Exception 메세지 출력
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
    <title>수정 페이지</title>
</head>
<body>
   
    <?php
        require_once(FILE_HEADER);
    ?>
     <!-- 에러메세지 표시 -->
    <?php
        foreach($arr_err_msg as $val) {
        ?>
        <p><?php echo $val ?></p>
        <?php
        }
        ?>
<div class = detail_main>
        
    <form action="/mini_board/src/update.php" method="post">
    <table>
        <input type="hidden" name="b_no" value="<?php echo $b_no?>">
        <input type="hidden" name="page" value="<?php echo $page_num?>">
    <colgroup>
            <col width="20%">
            <col width="50%">
        </colgroup>
    <tr>
        <th height="50">글 번호</th>
        <td class="detail_no"><?php echo $item["b_no"]; ?></td>
    </tr>

    <tr>
        <th height="50">제목</th>
        <td class="detail_title">
        <input type ="text" size = "51" name = "title" value="<?php echo $item["title"] ?>">
        </td>
    </tr>
    <tr>
        <th>내용</th>
        <td class="detail_contents" colspan='3' width="600">
        <textarea name="contents" id="contents" cols="50" rows="10"><?php echo $item["contents"]; ?></textarea>
        </td>
    </tr>
    </table>
    <section class="update_section">
    
    <button class="update_button_o cursor" type="submit"> 수정확인 </button>  
    <button class="update_button_x"><a class="gray" href="/mini_board/src/detail.php/?b_no=<?php echo $b_no; ?>&page=<?php echo $page_num; ?>"> 수정취소 </a></button>
      
    </section>
    </form>
</div>
</body>
</html>