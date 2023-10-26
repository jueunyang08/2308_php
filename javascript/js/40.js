// 인라인 이벤트
// html 파일 9~10 라인

// 프로퍼티 리스너 (잘 사용x / -> add event)
const BGOOGLE = document.getElementById('btn_google');
BGOOGLE.onclick = function() {
    location.href = 'http://google.com'
};
// addEventListener(eventType, function) 방식
//-----------
// 팝업창 열기
//-----------


const BDAUM = document.getElementById('btn_daum');
let winOpen;

BDAUM.addEventListener('click', popOpen);
//-----------
// 팝업창 닫기
//-----------
const BCLOSE = document.getElementById('btn_close');
BCLOSE.addEventListener('click', popClose);

//-----------
// 이벤트 삭제
//-----------
// BDAUM.removeEventListener('click', popOpen);
BCLOSE.removeEventListener('click', popClose);

function popOpen() {
    winOpen = open('http://daum.net', '_blank', 'width=500 height=500'); // target = '_self' -> 현재창에서
}

function popClose() {
    winOpen.close();
}

function test() {
    console.log('test');
};
// 콜백 함수
function cb(fnc) {
    fnc();
}

// 이벤트 타입

//1 . 마우스 이벤트
// 마우스 포인터가 요소 안으로 진입 했을때
const DIV1 = document.querySelector('#div1');

DIV1.addEventListener('mouseenter', bg);

function bg() {
    DIV1.style.backgroundColor = 'black'
    alert('div1에 들어왔어요.')
} 
//2. 키보드 이벤트
//3. 포커스 이벤트
//4. 폼 이벤트
//5. 진행(progress) 이벤트 