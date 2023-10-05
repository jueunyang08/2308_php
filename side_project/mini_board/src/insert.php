<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "parameter Error : %s"); //파라미터 에러 메세지
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

$arr_post = $_POST;
// DB connect
$conn = null;
$arr_err_msg =[];
$title = "";
$contents ="";



// GET 은 보안상 좋지않아 POST 로 통신 insert값을 보낸다

//POST로 request가 왔을때 처리
$http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인
if($http_method === "POST") {
    try {
        //파라미터 획득
        
     

        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 셋팅
        $contents = isset($_POST["contents"]) ? trim($_POST["contents"]) : ""; // content

        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목을 입력 하세요");
        }
        if($contents === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용을 입력 하세요");
        }
        if(count($arr_err_msg) === 0) {

        // DB 접속
        if (!db_conn($conn)) {
            // DB instance 에러
            throw new Exception("DB Error : PDO instance"); 
        }
        //글작성은 > DB insert 기존에 있는 데이터를 삭제 업데이트 갱신 할때는 트랜잭션 시작
        $conn->beginTransaction(); // 트랜잭션 시작

        // insert

        //정상적으로 처리가 되지 않을때 throw
        if(!db_insert_board($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards"); 
        }

        $conn->commit(); // 모든 처리 완료시 커밋

        // 리스트 페이지로 이동
        header("Location: list.php"); // 
        exit;
    }
    } catch (Exception $e) {
        $conn->rollback();
        // echo $e->getMessage(); // Exception 메세지 출력
        header("Location: error.php/?err_msg={$e->getmessage()}"); // error 메세지 출력 (error.php)
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
    <div class=detail_main>
        <?php
        foreach($arr_err_msg as $val) {
        ?>
        <p><?php echo $val ?></p>
        <?php
        }
        ?>
    <ul>
        <li>
            <label for="title">제목</label>
             <input class="" type="text" name="title" id = title size = 51 placeholder="제목을 입력하세요" value="<?php echo $title ?>">
        </li>

        <li>
             <label for="contents">내용</label>
            <textarea name="contents" id="contents" cols="50" rows="10" placeholder="내용을 입력하세요"><?php echo $contents ?></textarea>
        </li>
    </ul>
</div>
<section>
<button class="delete_button"><a class="gray" href="/mini_board/src/list.php"> 취소 </a></button>
<button class ="delete_button cursor"type="submit"> 작성 </button>
    
</section>
</form>
</body>
</html>