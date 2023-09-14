<?php
//namespace : 클래스를 구분해주기 위해 설정 /사용방법
//보통은 해당 파일의 패스로 작성.

// namespace 네임명
//$변수명 = new \네임명\클래스명();

namespace up;

class class1 {
// construct

public function  __construct() {
	echo "up class";
}
}

namespace down;
class class1 {
// construct
public function  __construct() {
	echo "down class";
}
}
namespace test;
use \up\class1;
// $obj_class1 = new \up\class1();
$obj_class1 = new class1();



