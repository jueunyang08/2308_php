
<?php
// xcopy D:\workspace\2308_php\side_project\multi_board C:\Apache24\htdocs\multi_board /E/Y

require_once("config.php"); // 설정파일 불러오기
require_once("autoload.php"); // 오토로드 파일 불러오기
// require_once("router\Router.php");

// 라우터 호출
new router\Router();