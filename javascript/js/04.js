// console.log("반갑습니다. js 파일입니다.");

// ---------------
// 변수 (var, let, const)
// 데이터타입 상관없이 다 들어감
// ---------------

// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);
// --------------------------------------------------
// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let u_name = "홍길동";
console.log(u_name);
u_name = "갑순이"; // 재할당
console.log(u_name);
// --------------------------------------------------
// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const AGE = 19;
// AGE = 20;
console.log(AGE);


// --------------------------------------------------
// (toUpperCase(대문자) / toLowerCase(소문자))
let str = "toUpperCase 예제";
console.log("str.toUpperCase() : " + str.toUpperCase());

str = "toLowerCase 예제";
console.log("str.toLowerCase() : " + str.toLowerCase());
// --------------------------------------------------