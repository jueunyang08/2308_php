<!-- xcopy 원본경로 카피경로 /E /Y

xcopy D:\workspace\2308_php\side_project\mini_test\src C:\Apache24\htdocs\mini_test\src /E /Y
-->

<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/"); //웹서버
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

// DB connect
$conn = null; // DB 커넥션 변수

$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try {
    //DB 접속
    if (!db_conn($conn)) {
        //DB 에러
        throw new Exception("DB Error : PDO instance"); // 강제 예외 발생
    }


    // ----------------------------
    // 페이징 처리 / 페이지 세팅 하기 
    // ----------------------------
    // 총 게시글 수 검색
    $board_cnt = db_select_board_cnt($conn);
    if ($board_cnt === false) {
        throw new Exception("DB Error : SELECT Count");
    }

    // 최대 페이지 개수 = (올림) ceil(게시글 개수(27) / 페이지 개수(5))
    $max_page_num = ceil($board_cnt / $list_cnt);

    // GET Method 확인
    if(isset($_GET["page"])) {
        $page_num = $_GET["page"]; // 유저가 보내온 페이지 세팅
    }
     // 오프셋 계산
    $offset = ($page_num - 1) * $list_cnt;

     // 이전 버튼
     $prev_page_num = $page_num - 1;
     if($prev_page_num === 0) {
         $prev_page_num = 1;
     }

     // 다음 버튼
     $next_page_num = $page_num + 1;
     if($next_page_num > $max_page_num) {
         $next_page_num = $max_page_num;
     }

    // DB 조회시 사용할 데이터 배열 생성
    $arr_param = [
    "list_cnt" => $list_cnt
    ,"offset" => $offset
    ];



        // 게시글 리스트 조회
        $result = db_select_board_paging($conn, $arr_param);
        if(!$result) {
            // Select 에러
            throw new Exception("DB Error : SELECT board"); // 강제 예외 발생 : SELECT board
        }


}
catch(Exception $e) {
    // 예외 발생 메세지 (getMessage 메소드) 출력
    echo $e->getMessage();
    // 처리 종료
    exit; 
}
finally {
    db_destroy_conn($conn); //DB 파기
}

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/common.css">
    <title>Document</title>
</head>
<body>
    <header> 
        <h1><a href="" class = "h"> MINI BOARD </a></h1>
    </header>


    <main>
    <table>
    <colgroup>
            <col width="10%">
            <col width="60%">
            <col width="30%">
        </colgroup>

        <?php
        // 리스트 생성
        foreach($result as $item) {
        ?>

        <tr>
            <!-- 글번호 --><td class ="w_no"><?php echo $item["b_no"]; ?></td>
            <!-- 제목 --><td class ="title_align"><?php echo $item["title"]; ?> </td>
            <!-- 작성일 --><td class = "b_date_align"><?php echo $item["b_date"]; ?></td>
        </tr>
        <?php } ?>
    </table>
    <section class="page_buttons_section">

        <!-- 이전 페이지 버튼 -->
        <a href="/mini_test/src/list.php/?page=<?php echo $prev_page_num ?>" class = "page_prev_button"><</a>
        <!-- 페이지 넘버 버튼 -->

        <!-- $i=1, 1이 증가하면서 최대 페이지수까지만 반복 -->
        <?php
            for($i = 1; $i <= $max_page_num; $i++) {
            
            // 현재 페이지에 활성화
            if ((int)$page_num === $i) {
            ?>
            <!-- a : 페이지 표시 버튼 -->
            <!-- 현재 페이지 -->
            <a class="act_bbg" href="/mini_test/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php
            } else {
            ?>
            <!-- 선택 하지 않은 페이지 -->
            <a class="bbg" href="/mini_test/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php
            }
            }
            ?>
        <!-- 다음 페이지 버튼 -->
        <a href="/mini_test/src/list.php/?page=<?php echo $next_page_num ?>" class = "page_next_button">></a>

        <!-- 글쓰기 버튼 -->
        <button type ="button" class ="write">쓰기</button>
    </section>
    </main>
</body>
</html>