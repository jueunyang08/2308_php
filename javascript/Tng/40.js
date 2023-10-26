//1. 버튼을 클릭시 alert 생성
// "안녕하세요"
// "숨어있는 div 를 찾아보세요"
const BTN = document.querySelector('#btn');

BTN.addEventListener('click', () => 
    alert('안녕하세요' + '\n' + '숨어있는 div를 찾아보세요'));

//2. 특정 영역에 마우스 포인터가 진입하면 아래 알러트
// "두근두근"
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', DGDG);

function DGDG() {
    alert('두근두근');     

};
// 들킨 상태에서는 알러트가 안나옴

//3. 2번의 영역을 클릭하면 아래의 알러트를 출력, 배경색이 베이지색
// "들켰다"

// DIV1.removeEventListener('mouseenter', DGDG); 

DIV1.addEventListener('click', DKD)

function DKD() {
    alert('들켰다');
    DIV1.style.backgroundColor = 'beige';

    DIV1.removeEventListener('mouseenter', DGDG);
    DIV1.removeEventListener('click', DKD);

    DIV1.addEventListener('click', R);
    
};

//4. 3번의 상태에서 다시한번더 클릭하면 아래의 알러트 출력하고,
// "다시 숨는다"
// 배경색이 흰색으로바뀌어 안보이게 됌

function R() {
    alert('다시숨는다'),
    DIV1.style.backgroundColor = 'white';

    DIV1.removeEventListener('click', R);
    DIV1.addEventListener('mouseenter', DGDG);
    DIV1.addEventListener('click', DKD)
};
