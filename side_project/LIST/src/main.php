<!-- xcopy 원본경로 카피경로 /E /Y

xcopy D:\workspace\2308_php\side_project\LIST C:\Apache24\htdocs\LIST /E /Y
-->

<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

// DB connect
$conn = null; // DB 커넥션 변수

// 리스트 표시 수
$list_cnt = 3;
// 페이지 번호 초기화
$page_num = 1; 

try     {
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
            $board_cnt = db_list_cnt($conn);
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

            // 리스트 조회
            $result = db_list_select($conn, $arr_param);
            if(!$result) {
                // Select 에러
                throw new Exception("DB Error : db_list_select"); // 강제 예외 발생 : SELECT board
            }
        }
catch(Exception $e) {
            // 예외 발생 메세지 (getMessage 메소드) 출력
            echo $e->getMessage();
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
    <link rel="stylesheet" href="/LIST/src/css/list.css">
</head>
<body>
<main>
    <div class= 'main_div center'>
        <!-- 헤더파일 -->
        <?php
        require_once(FILE_HEADER);
        ?>
    <p class = 'TODOLIST'>TO DO LIST</p>

        <div class= 'main_page_list_section'>
            <div class='align'>
            <?php
            // 리스트 생성
            foreach($result as $item) {

            ?>
                <ul>
                    <div class = 'li_div'>
                        <li><div class = 'bullet'><p class='num'><?php echo $item["l_no"]; ?></p></div><a class='list_title' href='/LIST/src/detail.php'><?php echo $item["title"]; ?></a>
                        <div class="border_line"></div>
                        </li>
                    </div>
                </ul>
            <?php } ?>
            </div>
    </div>
    <!-- 페이지 푸터 영역 -->
    <div class='page_footer_section'>
        <!-- 이전 버튼 -->
        <button class='btn_CSS prev_btn footer_position cursor' onclick="location.href='/LIST/src/main.php/?page=<?php echo $prev_page_num ?>'"></button>
        
        <!-- 페이지 넘버 영역 -->
        <div class = 'pagenum_section'>
        
            <!-- $i=1, 1이 증가하면서 최대 페이지수까지만 반복 -->

            <?php
            for($i = 1; $i <= $max_page_num; $i++) {
            

                // <!-- 페이지 넘버 버튼 -->

                // <!-- 현재 페이지에 활성화 -->
            
                    if ((int)$page_num === $i) {
                ?>
                        <a class='btn_CSS text_CSS footer_position' href='/LIST/src/main.php/?page=<?php echo $i; ?>'><?php echo $i; ?></a>
                <?php
                    } else {
                ?>
                        <a class='off_btn_CSS off_text_CSS footer_position' href='/LIST/src/main.php/?page=<?php echo $i; ?>'><?php echo $i; ?></a>
                <?php
                    }
                ?>
            <?php
            }
            ?>

        </div>

        <!-- 다음 버튼 -->
        <button class='btn_CSS next_btn footer_position cursor' onclick="location.href='/LIST/src/main.php/?page=<?php echo $next_page_num ?>'"></button>
    </div>
</main>
</body>
</html>