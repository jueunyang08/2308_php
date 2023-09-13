<?php
//폴더 디렉토리만들기 dir

// if mkdir("../tng/teatdir", 777\) {
// 	echo "정상";

// } else {
// 	echo"실패";
// }

//폴더 삭제
// rmdir("../tng/teatdir");

///////////////
// 파일 
///////////////

//파일 열기 (파일 열기 옵션/ a:내용 뒤에 추가 / w:내용이 삭제되고 처음부터)
$file = fopen("zz.txt", "r");

var_dump($file);

//파일 쓰기 
// $f_write = fwrite($file, "짜장면\n");

//파일 읽기
while ( $line = fgets($file)) {
	echo $line;
}



//파일의 오류가 없는지 판별 (조건 :)
if(!$file) {
	echo "거짓";
}
//파일 닫기
if(fclose($file)) {
	echo "정상";
};
//파일 삭제
unlink("zz.txt");
