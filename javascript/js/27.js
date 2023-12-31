let arr = [1,2,3,4,5];

// push() : 배열에 값을 추가
arr.push(6);
// > (6) [1, 2, 3, 4, 5, 6]

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(4,1); // (a, : 몇 인덱스부터 b : 몇개를 삭제 하겠다) 배열의 arr[2]를 삭제

arr.splice(2, 0, 10); // 배열의 arr[2]에 값이 '10'인 인덱스를 추가
// > (7) [1, 2, 10, 3, 4, 5, 6]

arr.splice(2, 1, 11); // 배열의 arr[2]부터 '1'개를 삭제하고 '10'을 추가
// > 동시실행 (7) [1, 2, 11, 3, 4, 5, 6] 
// >         (6) [1, 2, 11, 4, 5, 6]

// arr.splice(2,0,10,11,12,13); // 3번째 부터는 파라미터 추가

// arr.indexOf(4); // 해당 값이 들어가있는 인덱스 번호를 출력

// lastIndexOf() : 배열에서 특정 요소중 가장 마지막에 위치한 요소를 찾는데 사용
// arr = [1,1,1,3,4,5,6,6,6,10];

// pop() : 배열의 가장 마지막 요소를 삭제 < ※ 원본을 변경하는 메소드 >
let i_pop = arr.pop(); // 변수에 담았고 , i_pop 을 실행하면 마지막 요소가 담김

// sort() : 배열을 정렬 < ※ 원본을 변경하는 메소드 >
arr = [5,4,6,7,3,2];
let arr_sort = arr.sort((a,b) => a - b) // 오름차순 정렬
arr_sort = arr.sort((a,b) => b - a) // 내림차순 정렬

// 원본 데이터를 유지하면서 별도의 새로운 배열을 만드는 방법 Array.from()
// php 랑 동작방식이 달라서 주의해야함. (주소참조방식)
let arr1 = arr;
let arr2 = Array.from(arr);

// includes() : 배열의 특정요소를 가지고 있는지 판별
arr = ['치킨', '육회비빔밥', '비엔나'];
let boo_includes = arr.includes('짜장면');

// ex) arr.includes('비엔나')
// > true / false

// join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
// ex) arr.join('');
// > '치킨,육회비빔밥,비엔나'

// map() : 배열의 모든요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴

arr = [1,2,3,4,5,6,7,8,9];
// 모든 요소의 값이 *2로 된 값을 리턴하고 싶을때.
let arr_map = arr.map(num => num * 2);

arr_map = arr.map(num => {
    if (num % 3 === 0 ) {
        return '짝';
    } else {
        return num;
    }
});

// some() : 판별 함수를 통과하는 요소가 있는지 판별 (return boolean)
// 복잡한 연산에 트루 펄스를 판별 가능

arr = [1, 2,3,4,5,6,7,8,9];
let boo_some = arr.some(num => num > 10);
// > false //함수의 조건에 맞는 요소가 하나라도 있으면 true
// -------------------------------------------------------------

// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true,
// 하나라도 만족 안하면 false (return boolean)
arr = [1, 2,3,4,5,6,7,8,9];
let boo_every = arr.some(num => num === 9);

//---------------------------------------------------------------

// filter() : 배열의 요소중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
arr = [1,2,3,4,5,6,7,9];
let boo_filter = arr.filter(num => num % 3 === 0); // 3의 배수만 모아서 새로운 배열을 만들어 출력

//---------------------------------------------------------------
