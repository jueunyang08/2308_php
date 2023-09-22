<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT. "lib/lib_db.php"); // DB 관련 라이브러리

$conn = null;
$page_num = $_GET["page"];
try {

     // DB 접속
     if (!db_conn($conn)) {
        // DB Instance 에러
        //아규먼트로 에러 메세지를 출력
        throw new Exception("DB Error : PDO instance"); // 강제 예외 발생 : DB Instance
        }



    $b_no = "";
    // b_no (pk) 확인
   
    if(!isset($_GET["b_no"]) || $_GET["b_no"] === "") {
        throw new Exception("Parameter ERROR : No b_no"); // 강제 예외 발생 :
    }

    $b_no = $_GET["b_no"]; // id 셋팅

    // 

    $arr_param = [
        "b_no" => $b_no
    ];

    // pk 를 이용하여 게시글 데이터 조회
    $result = db_select_boards_b_no($conn, $arr_param);

    // 게시글 조회 예외 처리

    if(!$result) {
        //게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");

    } else if( !(count($result) === 1) ) {
        // 게시글 조회 count 에러 
        throw new Exception("DB Error : PDO Select_id count, ".count($result));
    }

    $item = $result[0];

}
catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

finally {
    db_destroy_conn($conn); //DB 파기
}

$input_b_no = $_GET["b_no"];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>상세페이지</title>
</head>
<body>
<?php
    require_once(FILE_HEADER);
    ?>
<table>
    <tr>
        <th>글 번호</th>
        <td><?php echo $item["b_no"]; ?></td>
        <th>작성일</th>
        <td><?php echo $item["b_date"]; ?></td>
</tr>

    <tr>
        <th>제목</th>
        <td><?php echo $item["title"]; ?></td>
    </tr>
    <tr>
        <th>내용</th>
        <td><?php echo $item["contents"]; ?></td>
    </tr>
    </table>
    <a href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>"> 뒤로 </a>
    <a href=""#>수정</a>
    <a href=""#>삭제</a>
   

</body>
</html>