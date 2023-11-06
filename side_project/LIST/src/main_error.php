<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/LIST/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리
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
                <p class=error_MSG> NO LIST </p>
            </div>
    </div>
    <!-- 페이지 푸터 영역 -->
    <div class='page_footer_section'>
        <!-- 이전 버튼 -->
        <button class='btn_CSS prev_btn footer_position cursor' onclick="location.href='/LIST/src/main_error.php'"></button>

        <!-- 다음 버튼 -->
        <button class='btn_CSS next_btn footer_position cursor' onclick="location.href='/LIST/src/main_error.php'"></button>
    </div>
</main>
</body>
</html>