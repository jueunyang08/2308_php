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
            <div class= 'content_section'>

            </div>
        
            <!-- 페이지 푸터 영역 -->
            <div class='page_footer_section'>
                <!-- 취소 버튼 -->
                <button class='footer_position c_w_btn cursor' onclick="location.href='/LIST/src/main.php'">취소</button>
                <!-- 작성 버튼 -->
                <button class='footer_position c_w_btn w_btn cursor'>작성</button>
            </div>
        </div>
    </main>
</body>
</html>