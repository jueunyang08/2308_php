//  두수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.

function sum(a,b) {
    return a + b;
}

function myCallBack(fnc) {
    fnc();
}

myCallBack( () => {
    console.log('1,2,3')
});


// 함수를 3개를만들어주세요.

// php 를 출력하는 함수
function php() { 
console.log('php')};
// 504를 출력하는 함수
function num() { 
    console.log('504')};
// 풀 스택을 출력하는 함수
function fname() { 
    console.log('풀스택')};

// 1번함수는 3초뒤에 출력
setTimeout(php, 3000);
// 2번함수는 5초뒤에 출력
setTimeout(num, 5000);
// 3번 함수는 바로 출력
fname();


function plus() {
    setTimeout(php, 3000);
    setTimeout(num, 5000);
    fname();
};

// 현재 시간 구해주세요.
let now = new Date;

let year = now.getFullYear();
let month = now.getMonth() + 1;
let day = now.getDate();
let hour = now.getHours();
let minute = now.getMinutes();
let second = now.getSeconds();

const time = year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second;

// 버튼을 하나 만듭시다. // 버튼을 클릭하면 네이버로 이동시켜 주세요.
const NAVER = document.querySelector('#naver_btn');

NAVER.addEventListener('click', naver_link);

function naver_link() {
    open('http://naver.com', '_self');
}

// CSS
NAVER.style.backgroundColor = 'green';
NAVER.style.color = 'white';
NAVER.style.border = 'none';
NAVER.style.cursor = 'pointer';
NAVER.style.width = '70px'
NAVER.style.height = '50px'
NAVER.style.borderRadius = '10px';