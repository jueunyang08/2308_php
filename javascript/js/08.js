
// 조건문
// if(조건) {

// } else if(조건) {

// } else {

// };

// switch
let age = 50;
switch(age) {
    case 20:
        // 처리
        console.log('20대');
        break;
    case 30:
        // 처리
        console.log('30대');
        break;
    default:
        // 처리
        console.log('모르겠다');
        break;
}
// ----------------------------------------------------------
// 반복문 (while, do_while, for, foreach, for...in, for....of)
// ----------------------------------------------------------

// foreach : 배열만 사용가능
let arr = [1, 2, 3, 4];

// arr.forEach( function( val, key ) {
//     console.log(`${key} : ${val}`);
// });

// for...in : 모든 객체를 루프 가능(but, 'key'에만 접근 가능)

// let s1 = 's1'
// let s2 = 's2'

// let obj = {
//     key1: 'val1',
//     key2: 'val2'
// }
// for( let key in obj) {
//     console.log(key);
// }
// for( let key in obj) {
//     console.log(obj[key]);
// }
// for...of : 모든 <iterable> 객체를 루프 가능(but, 'val'에만 접근 가능 (string, array, Map, set, typeArray..))
// for( let val of arr) {
//     console.log(arr);
// }

// 정렬해주세요.

let sort_arr = [3, 5, 2, 7, 10];
// 1번 sort
let sort_arr2 = sort_arr.sort((a,b) => a-b);
console.log('sort '+sort_arr);

// 2번 function
sort_arr.sort(function(a, b) {
    if(a>b) return 1;
    if(a===b) return 0;
    if(a<b) return -1;
});
console.log('function '+sort_arr);

// 3번 for
for(let j=0; j<sort_arr.length; j++) {
    for(let i=0; i<sort_arr.length - 1; i++) {
        if(sort_arr[i]>sort_arr[i+1]) {
            let swap = sort_arr[i];
            sort_arr[i] = sort_arr[i+1];
            sort_arr[i+1] = swap;
        }
    }
};
console.log('for문 '+sort_arr);