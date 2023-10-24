// -------------
// 기본 데이터 타입 
// -------------
// typeof 변수명 -> 데이터 타입

// 숫자(number)
let num = 1;

// 문자(string)
let str = "문자열";

// 불리언(bloolean)
let boo = true;

// null (객체 - object)
let n = null;

// undefined
let und; // 값을 할당 하지않은 상태

// symbol : 고유한 ID를 가진 데이터 타입 (안에 값과 데이터가 같아도 고유한 값을 지정해줌 ex) PK
let symbol_1 = Symbol("symbol"); // id1
let symbol_2 = Symbol("symbol"); // id2
// > symbol_1 === symbol_2
// < false

// ----------------------------------------------
// 객체 타입 (중괄호)
// Object

let obj = {
        food1: "탕수육"
        ,food2: "짜장면"
        ,food3: "라조기"
        ,eat: function() {
            console.log("먹자");
        }
        ,list: {
            list1: "리스트1"
            ,list2: "리스트2"
        }
};
// ※ 출력 형태
// obj.food1 => '탕수육'
// obj['food1'] => '탕수육'
// obj.eat(); => 먹자 // 보통 함수는 출력할때 함수를 호출하지 않고, 변수에 담아서 변수를 실행시킨다.
// obj.list.list1 => '리스트1'
// ----------------------------------------------

// Array(배열)
let arr = [1, 2, 3];
// arr.length : array 안에 데이터 수 출력
// ※ 출력 형태
// arr => 
// (3) [1, 2, 3]
//  0: 1
//  1: 2
//  2: 3
//  length: 3
//  [[Prototype]]: Array(0)
// ----------------------------------------------

// Date
// Math 
// 그 외에 기본 데이터 타입을 제외한 모든 것

// 자기 자신의 회원정보를 객체로 만들어 보세요.

let inf = {
    m_name: '양주은',
    m_birth: 19970703,
    m_gender: 'F'
}