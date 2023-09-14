<?php

//class는 동종의 객체들이 모여있는 집합을 정의한것

class ClassRoom //객체지향 카멜기법
{
	// 클래스 / 멤버 필드  
	//접근제어 지시자 : public, private, protected
	// 멤버 변수
	public $cpt; // 어디에서나 접근 가능
	public $cpt1;
	private $book; // class 내에서만 접근 가능
	protected $bag; 
	 // class 와 나를 상속 받은 자식 class 내에서만 접근 가능

	//메소드(method) : class 내에 있는 함수
	public function class_room_set_value() {
		$this->cpt = "컴퓨터";
		$this->cpt1 = "컴퓨터2";
		$this->book = "책";
		$this->bag="가방";
	}

	// 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어주세요.
	public function class_room_print() {
		$str = $this->cpt."\n".
			$this->cpt1."\n".
		$this->book."\n".
		$this->bag."\n";

		echo $str; }

		//static : instance생성을 하지않아도 호출 할수 있습니다.

		// public static function static_test();

	}

// class instance 생성
$obj_ClassRoom = new ClassRoom();
// $obj_ClassRoom -> cpt = "ffefe";
// $obj_ClassRoom->class_room_set_value();
$obj_ClassRoom->class_room_set_value();
$obj_ClassRoom->class_room_print();

//static 객체 사용방법
ClassRoom::static_test();