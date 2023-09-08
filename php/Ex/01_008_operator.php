<?php
// 1.산술 연산자
// echo "더하기 : 1 + 1 = ", 1 + 1, "\n";
// echo "빼기 : 1 - 1 = ", 1 - 1, "\n";
// echo "곱하기 : 2 * 3 = ", 2 * 3, "\n";
// echo "나누기 : 2 / 3 = ", 2 / 3, "\n";
// echo 10 - 5 * 8 / 10, "\n";
// echo "나머지 : 2 % 3 = ", 2 % 3, "\n";

//2. 증가/감소(증감) 연산자
// $num1 = 8;
// $num1++;
// echo $num1, "\n";
// $num1--;

// echo $num1, "\n";
// echo $num1++, "\n";
// echo ++$num1, "\n";

// 3. 산술 대입 연산자
// $num = 5;
// $num = $num + 2;
// $num += 2;
// $num -= 2;
// $num *= 2;
// $num /= 2;
// $num %= 6;

// $tng_num = 10;

// echo $tng_num += 10, "\n";
// echo $tng_num /= 5, "\n";
// echo $tng_num -= 4, "\n";
// echo $tng_num %= 7, "\n";
// echo $tng_num *= 3 , "\n"; 

// 4. 비교 연산자
// var_dump() :개발상에서만 사용하는 코드 외부유출 가능성있음

// var_dump(1 > 0);
// var_dump(1 < 0);
// var_dump(1 >= 0);
// var_dump(1 <= 0);
// $num = 1;
// $str = '1';
// var_dump($num == $str); // 값의 형태만 비교 (불완전비교)
// var_dump($num === $str); // 값의 데이터 타입까지 비교 (완전비교)
// var_dump($num != $str); // 값의 데이터 타입까지 비교 (불완전비교)
// var_dump($num !== $str); // 값의 데이터 타입까지 비교 (완전비교)

// 5. 논리 연산자
// AND 연산자 (&&)
var_dump(1===1 && 2===2);
var_dump(1===1 && 2===1);

// OR 연산자 (||)
var_dump(1===1 || 2===2);
var_dump(1===1 || 2===1);
var_dump(1===2 || 2===1);

// NOT 연산자 ( !() ) 연산의 결과를 반대로
var_dump(!(1===1));
?>