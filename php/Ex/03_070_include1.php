<?php
// include 오류  파일을 불러와도 기존에 있던 처리는 실행
include("./02_070_include2.php");

include_once("./02_070_include2.php");
// _once 같은 파일을 불러와도 한번만 실행

//require 오류 파일을 불러오면 모든 실행 동작 X
require("./02_070_include2.php");
require_once("./02_070_include2.php");
echo "include 111 \n";