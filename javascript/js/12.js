// 함수

// 함수 생성
// 함수 선언식 : 호이스팅에 영향을 받음.
function fnc_sum(a, b) {
return a + b;
}
// 함수 표현식 : 호이스팅에 영향을 받지 않음.
const fnc1 = function(a, b) { // * 익명 함수 : 이름없이 작성 (어딘가에 보관하거나 파라미터로 콜백할때)
    return a+b;
}
// * 콜백함수 : 다시 호출되는 함수
function fnc_callBack(call) {
    call();
}

fnc_callBack(function() {
    console.log('익명함수');
})

// 배열객체의 sort의 경우 예시 (**동작은 안함**)
// sort_arr.sort(function(a, b) {
//     return a-b
// });

function sort(call) {
    let num = call();
    if(num < 0) {
    }
}
// Fuction 생성자 함수 잘안씀
let tt = Function('a', 'b', 'return a+b;');

// 화살표 함수 (arrow Function)
// 파라미터가 없는 경우
let f1 = function() {
    return "f1";
}
let f2 = () => "f2";

// 파라미터가 1개인 경우
let f3 = function(a) {
    return a + '입니다.';
}
let f4 = a => a+'입니다.';
// 파라미터가 2개 이상인 경우
let f5 = function(a,b) {
    return a+b;
}
let f6 = (a, b) => a + b;
// 함수의 처리가 많을 경우 중괄호로 감싸주면 된다.
let f7 = (a, b) => { a + b };