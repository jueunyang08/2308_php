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


//------------
// 스코프
//------------
// 전역 스코프 : 어디서든 쓸수있는 변수
let gender = "M";

// 함수레벨 스코프
function test1() {
    let t = "test1";
    console.log(t);
    console.log(gender);
}
//블록레벨 스코프 -> 중복선언이 불가능하여 재할당할시 덮어씌워짐
function test() {
    let test1 = "test1";
    {
        let test1="test2";
        test1="test3";
        console.log(test1);
    }
    console.log(test1);
}

//----------
//호이스팅(hoisting) : 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
//----------
//인터프리터 : 프로그래밍 언어의 소스코드를 바로 실행하는 컴퓨터 프로그램 또는 환경
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

console.log(hlet);

function htest1() {
    return "htest1 함수입니다.";
}
console.log(hlet);
var hvar = "var로 선언"; // var 우선 할당만 해놓고 값을 불러오지 못하니 undefined로 출력됌
let hlet = "let으로 선언"; // let 호이스팅이 안됌. 자바스크립트는 에러가나면 그 시점부터
// 정지 하기때문에 두번 출력해도 에러는 한번밖에 출력되지않는다.

// 변수를 사용할땐 상단에 선언해놓고 코드를 쓰는게 좋음.