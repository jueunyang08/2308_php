<?php
// class  ** 첫글자 대문자 + 카멜기법 으로 클래스명을 작성함**

// 자동차 클래스


//부모
class Car {
    protected $name = "";
    protected $company = "";

    protected function move() {
        echo "전진!\n";
    }
    protected function stop() {
        echo "정지!\n";
    }
    public function auto() {
        echo $this->company." ".$this->name." ";
        $this->move();
        $this->stop();
    }
}

class Kia extends Car {
    public function __construct($name) {
        $this->name= $name;
        $this->company = "기아";
    }    
}

class Toyota extends Car {
    public function __construct($name) {
        $this->name= $name;
        $this->company = "기아";
    }    
}
$obj = new kia("레이");

$obj->auto();

