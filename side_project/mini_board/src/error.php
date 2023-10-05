<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>에러 페이지</title>
</head>
<body>
    <?php
    require_once(FILE_HEADER);
    ?>
    <main>
        <p> 쏴리 </p>
        <p> code : E01 </p>
        <br>
        <?php echo $err_msg ?>
        <br>
        <button><a href="/mini_board/src/list.php">메인으로 이동</a></button>
</main>
</body>
</html>