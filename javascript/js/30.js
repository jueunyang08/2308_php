
// 오늘 날짜 가져오기 
let now = new Date();

// getFullyear() : 연도만 가져오는 메소드
let year = now.getFullYear();
console.log(now.getFullYear());

//getmonth() : 월만 가져오는 메소드 (+1을 해줘야 현재월과 같다)
let month = now.getMonth()+1;
console.log(now.getMonth());

//getDate() : 일만 가져오는 메소드 (+1을 해줘야 현재월과 같다)
let date = now.getDate();
console.log(now.getDate() + 1 );

// getDay() : 요일을 가져오는 메소드 (0일요일 ~ 6토요일)
console.log(now.getDay());
 
console.log(now.getHours()); // 시
console.log(now.getMinutes()); // 분
console.log(now.getSeconds()); //초 
console.log(now.getMilliseconds()); // 밀리초

// 요일 판별 switch문
let day = now.getDay();
let KDay = '';
switch (day) {
    case 1:
        KDay = '월요일';
        break;
    case 2:
        KDay = '화요일';
        break;
    case 3:
        KDay = '수요일';
        break;
    case 4:
        KDay = '목요일';
        break;
    case 5:
        KDay = '금요일';
        break;
    case 6:
        KDay = '토요일';
        break;
    default:
        KDay = '월요일';
        break;
};

console.log(now.getDay() + ' : ' + KDay)

//-------------------------------------
// 현재 년 월 일 가져오기
// 기준일 : 2023-09-30 19:20:10
// 오늘로 부터 몇일 전인지 구해봅시다.
now = new Date(); // 오늘 date

let now_2 = new Date();

SDate = new Date('2023-09-30 19:20:10');
now_2 = new Date(year, month-1, date, 0, 0, 0, 0); // 오늘날짜 0시 0분 0초 0밀리초 가져오는 방법

let bd = Math.ceil((now.getTime()-SDate.getTime()) / (1000*60*60*24));
// 절대값 abs
// let diff = Math.abs(Math.floor((now2 - sDate) / 86400000));