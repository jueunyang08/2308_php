<?php

// 쿠키 삭제 방법 
setcookie("myCookie", "홍길동", time());

// 이전에 설정한 쿠키의 키 (첫번째 )만 같으면
// 시간을 재 설정하여 쿠키를 삭제 할수있다.