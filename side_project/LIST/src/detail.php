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
                <div class='l_no'>1</div>
                <p class="detail_title">To do list1</p>
            </div>

            <div class='detail_content_section'>
                <div class='scroll_box'>
                    <div class='detail_content'>
                    가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가나다라마바사아ㅏ자착카타가
                    </div>
                </div>
                <div class='detail_date'>
                    <!-- 수정일 -->
                    <p class='date_CSS'>U_date 2023/11/02</p>
                    <!-- 작성일 -->
                    <p class='date_CSS'>C_date 2023/11/02</p> 
                </div>
            </div>
        
            <!-- 페이지 푸터 영역 -->
            <div class='page_footer_section'>
                <!-- 뒤로가기 버튼 -->
                <button class='btn_CSS prev_btn footer_position cursor' onclick="location.href='/LIST/src/main.php'"></button>
                <!-- 수정 버튼 -->
                <button class='btn_CSS update_btn footer_position cursor' onclick="location.href='/LIST/src/update.php'"></button>
                <!-- 삭제 버튼 -->
                <button class='btn_CSS delete_btn footer_position cursor'></button>
            </div>
        </div>
    </main>
</body>
</html>
