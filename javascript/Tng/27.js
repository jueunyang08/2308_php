// 1. 원본은 보존하면서 오름차순 정렬 해주세요.

const ARR1 = [6,3,5,8,92,3,7,5,100,80,40];

let ARR1_SORT = Array.from(ARR1);
ARR1_SORT = ARR1_SORT.sort((a,b) => a - b);

// 2. 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어 주세요.
const ARR2 = [5,7,3,4,5,1,2];
let arr_filter1 = ARR2.filter(num => num % 2 === 0); //짝수
let arr_filter2 = ARR2.filter(num => num % 2 === 1); //홀수

// 함수 풀어서
const ARR3 = [5,7,3,4,5,1,2];
let arr_filter3 = ARR3.filter(function(num) { //짝수
    if(num%2===0) return 1;
});
let arr_filter4 = ARR3.filter(function(num) { //홀수
    if(num%2===1) return 1;
});

// 함수로 호출 
function test(arr, flg) {
    if(flg === 0) {
        return arr.filter(num => num % 2 === 0); // flg가 0일때 짝수
    } else {
        return arr.filter(num => num % 2 === 1);
    }
}




//3. 다음 문자열에서 구분문자를 '.' 에서 ' ' (공백)으로 변경 해주세요.
const STR1 = 'p,hp,504.m,eer.ka,t';

// replaceAll
STR1.replaceAll('.',' ');

//---------------------------------

// split
STR1.split(',').join(' '); // split ('.') 을 기준으로 문자열을 잘라서 배열로 만들고 join으로 배열을
//합쳐서 사이에 ' ' 공백을 넣는다.

//---------------------------------

// slice
let STR2 = STR1.slice(0,6);
let STR3 = STR1.slice(7,11);
let STR4 = STR1.slice(12,15);

arr_STR = [STR2, STR3, STR4];
let j_arr_STR = arr_STR.join(' ');

//---------------------------------