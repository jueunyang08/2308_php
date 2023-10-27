// 타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
// setTimeout(() => console.log('시간'), 3000); // 3초 뒤 '시간' 문자열이 콘솔에 출력됌.

// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초뒤에 'C'가 출력되도록 프로그램을 만들어 주세요.
// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);
// -------------------------------------2
// function my_print(chr, ms) {
//     setTimeout(() => console.log(chr), ms);
// }
// my_print('A', 1000);
// my_print('B', 2000);
// my_print('C', 3000);
// --------------------------------------3

// let i = 1;
// setTimeout(function run() {
//     func(i++);
//     setTimeout(run, 100);
// }, 100);

// 2. 타이머 삭제 : clearTimeout(해당 setTimeout객체)

let myset = setTimeout(() => console.log('c'), 5000);
clearTimeout(myset);

// 3. 일정 시간마다 반복 : setInterval(콜백함수, 시간(ms));
let myInter = setInterval(() => console.log('민경이 자지마'),1000);

// 4. setInterval 삭제 : 
clearInterval(myInter);

// ** 화면을 로드하고 5초 뒤에 '두둥등장' 이라는 매우 큰 글씨가 나타나게 해주세요. **

// const H1 = document.querySelector('h1'); // 화면에 영역 생성

// // 
// function print(chr, ms) {
//     setTimeout(() => H1.innerHTML=chr, ms) // 실행될 함수 . (H1변수에 innerHTML=파라미터, 시간)
// };
// // 함수 실행
// print('두둥등장', 5000);

setTimeout(myAddH1, 5000)

function myAddH1() {
    const H1 = document.createElement('h1');
    H1.innerHTML = '두둥등장';
    H1.style.fontSize = '100px';
    document.body.appendChild(H1);
}



