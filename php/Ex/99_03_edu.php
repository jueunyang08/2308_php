<?php
// 슈퍼 글로벌 변수 $_
    // print_r($_SERVER);
    // GET 
    // 단순 페이지 이동. id = 값
    print_r($_GET);

    // POST
    // 유저 입력값은 POST로 받아와야한다
    // input name
    print_r($_POST);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/99_03_edu.php" method="post">
        <lable name ="ID">ID</lable>
        <input type="text" name="ID"> <br>
        <lable name ="PW">PW</lable>
        <input type="password" name="PW"> <br>
        <input type="hidden" name="name" value = "미어캣">
        <button type="submit">post</button>
</form>
</body>
</html>