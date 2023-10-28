<!-- xcopy 원본경로 카피경로 /E /Y

xcopy D:\workspace\2308_php\side_project\LIST C:\Apache24\htdocs\LIST /E /Y
-->

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
    <title>list</title>
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
            <ul>
                <li><div class = 'bullet'><p class='num'>3</p></div><span class='list_name'>To do gggggggggggggggggggggggggggggggggggggggggggggglisfeeft 3</span>
                <div class="border_line"></div>
                </li>
                <li><div class = 'bullet'><p class='num'>3</p></div><span class='list_name'>To do list 3</span>
                <div class="border_line"></div>
                </li>
                <li><div class = 'bullet'><p class='num'>3</p></div><span class='list_name'>To do list 3</span>
                <div class="border_line"></div>
                </li>
            </ul>
        </div>
    </div>

    <div class='page_footer_section'>
        <button class='prev_btn footer_position'><a href=""></a></button>
        <button class='next_btn footer_position'><a href=""></a></button>
    </div>
</main>
</body>
</html>