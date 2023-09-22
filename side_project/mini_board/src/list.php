<!-- xcopy 원본경로 카피경로 /E /Y

xcopy D:\workspace\2308_php\side_project\mini_board\src C:\Apache24\htdocs\mini_board\src /E /Y
-->

<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

// DB connect
$conn = null; // DB 커넥션 변수

$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try {
        // DB 접속
            if (!db_conn($conn)) {
            // DB Instance 에러
            //아규먼트로 에러 메세지를 출력
            throw new Exception("DB Error : PDO instance"); // 강제 예외 발생 : DB Instance
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
            // 예외 발생 메세지 (getMassege 메소드) 출력
            echo $e->getMassege();
            // 처리 종료
            exit; 
        }
finally {
            db_destroy_conn($conn); //DB 파기
        }
?>
<!-- ------------------------------------------------------------------------ -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트 페이지</title>
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
</head>
<body>
    <?php
    require_once(FILE_HEADER);
    ?>
    <main>
        <table>
            <colgroup>
            <col width="20%">
            <col width="50%">
            <col width="30%">
        </colgroup>
            <tr class="table-title">
                <th> 번호</th>
                <th> 제목 </th>
                <th> 작성일 </th>
            </tr>
            <?php
            // 리스트 생성
            foreach($result as $item) {

            ?>
            <tr> 
                <td><?php echo $item["b_no"]; ?> </td>
                <td> <a href="/mini_board/src/detail.php/?b_no=<?php echo $item["b_no"]; ?>&page=<?php echo $page_num; ?>"><?php echo $item["title"]; ?> </a> </td>
                <td><?php echo $item["b_date"]; ?> </td>
            </tr>
           <?php } ?>

        </table>

        <section class = write_section>
        <!-- 글쓰기 버튼 -->
        <a class = "write" href="/mini_board/src/insert.php">글쓰기</a>
        </section>
      
        <section class = page_section>
            <!-- 이전 페이지 버튼 -->
            <a class = "page_button" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>"><</a>
            <!-- $i=1, 1이 증가하면서 최대 페이지수까지만 반복 -->
            <?php
            for($i = 1; $i <= $max_page_num; $i++) {
            ?>
            <!-- a : 총 페이지 수 표시 버튼 -->
            <a class = "page_button" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php
            }
            ?>
            <!-- 다음 페이지 버튼 -->
            <a class = "page_button" href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>">></a>
        </section>
    </main>



</body>
</html>

