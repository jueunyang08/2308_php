<!-- xcopy 원본경로 카피경로 /E /Y

xcopy D:\workspace\2308_php\side_project\mini_board\src C:\Apache24\htdocs\mini_board\src /E /Y
-->


<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
require_once(ROOT. "lib/lib_db.php");
// var_dump($_SERVER);

$conn = null;
// DB 접속
if (!db_conn($conn)) {
    echo "DB Error : PDO instance"; 
    exit; // 에러 시 아래 소스코드 실행안함
}
// 게시글 리스트 조회
$result = db_select_board_paging($conn);
if(!$result) {
    echo "DB Error : SELECT board";
    exit; 
}

db_destroy_conn($conn); //DB 파기

// var_dump($result);

?>


<!-- -------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트 페이지</title>
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <header>
    <h1>mini Board</h1>
    </header>
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
                <th>작성일</th>
            </tr>
            <tr>
                <td>5</td>
                <td>5번 게시글</td>
                <td>2023/09/20/ 14:50</td>
            </tr>
            <tr>
                <td>4</td>
                <td>4번 게시글</td>
                <td>2023/09/19/ 13:50</td>
            </tr>
            <tr>
                <td>3</td>
                <td>3번 게시글</td>
                <td>2023/09/18/ 12:50</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2번 게시글</td>
                <td>2023/09/06/ 11:50</td>
            </tr>
            <tr>
                <td>1</td>
                <td>1번 게시글</td>
                <td>2023/09/01/ 10:50</td>
            </tr>
        </table>
        <section>
            <a href="#"><</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
        </section>
    </main>



</body>
</html>

