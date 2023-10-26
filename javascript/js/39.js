// 1. DOM (Document Object Model)
// 웹 문서를 제어하기위해 웹 문서를 객체화 한 것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작가능

// 2. 요소 선택
// 2-1. 고유한 ID로 요소를 선택 getElementById
const TITLE = document.getElementById('title');
const SUBTITLE = document.getElementById('subtitle');

TITLE.style.color = 'blue'; // document. style 로 접근 했을때, 무조건 인라인으로 들어감

// 2-2 태그명으로 요소를 선택 getElementsByTagName
const H2 = document.getElementsByTagName('h2') // collection 객체 (다수이기때문에) (반복문을 사용하기 어려움)

// 첫번째 h2 태그를 가져올때 -> H2[0]

// 2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');
// NONE[0].style.color = 'red';

// 2-4. CSS 선택자를 사용해 요소를 찾는 메소드 ★★★
//node .
const S_ID = document.querySelector('#subtitle');
const S_NONE = document.querySelector('.none-li'); // querySelector : 복수일 경우 가장 첫번째 요소만 선택
const S_NONE_ALL = document.querySelectorAll('.none-li'); // querySelector : 복수일 경우 가장 첫번째 요소만 선택

// for(let i=0; i < NONE.length; i++) { // 해당 변수에 담긴 요소 전체 적용
//     NONE[i].style.color='red';
// }

// ---------------
// 3. 요소 조작
// ---------------

// textContent : 순수 텍스트 데이터 전달, 이전 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>'
// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거 ★★★
TITLE.innerHTML = '<p>탕수육</p>'

// setAttribute('','') : 요소에 속성을 추가
const INTXT = document.getElementById('intxt');
// INTXT.setAttribute('placeholder', 'gefsfegefefe')
// 몇몇 속성들은 DOM객체에서 바로 설정가능 ex) INTXT.placeholder;

// removeAttribute('') : 요소의 속성을 제거
INTXT.removeAttribute('placeholder');

// ---------------
// 4. 요소 스타일링
// ---------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red'; 

// classList : 클래스로 스타일 추가 또는 삭제

TITLE.classList.add('sss','aaa','www');
TITLE.classList.remove('sss','aaa');

// ------------------
// 5. 새로운 요소 생성
// ------------------
// 요소 만들기
const LI = document.createElement('li');

//삽입할 부모 요소 접근
const UL = document.querySelector('#ul')

// -> LI.innerHTML="하이" // 생성한 li에 요소(내용) 추가
// -> UL.appendChild(LI); // 맨 마지막 ul 태그 밑에 li 삽입

// 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('li:nth-child(5)');

// UL.insertBefore(LI, SPACE);
LI.innerHTML="전"
// 요소 위치를 지정해 추가할때, 하나만 생성하게 되면 위에서 적용한 위치가 변경됌

// 해당 요소를 삭제하는방법
LI.remove();

// let LI2 = document.createElement('li')
// UL.insertBefore(LI, SPACE)

// 1. 사과게임 위에 장기를 넣어주세요.
const LI2 = document.createElement('li');
const PLACE = document.querySelector('li:nth-child(4)');
UL.insertBefore(LI2, PLACE);
LI2.innerHTML='장기'
// 2. 어메이징브릭에 베이지 배경색을 넣어주세요.
const AB = document.querySelector('li:last-child');
AB.style.backgroundColor = 'beige'

// 3. 리스트에서 짝수는 빨간색 글씨, 홀수는 파란색 글씨
const EVEN = document.querySelectorAll('li:nth-child(even)');
for(let i=0;i<EVEN.length;i++) {
    EVEN[i].style.color = 'red';
}
const ODD = document.querySelectorAll('li:nth-child(odd)');
for(let i=0;i<ODD.length;i++) {
    ODD[i].style.color = 'blue';
}
//------------------------------------------------
const LI_ALL = document.querySelectorAll('li');
let LI_length = LI_ALL.length;

for(i=1;i<=LI_length;i++) {
    if(i % 2 === 0) {
        LI_ALL[i-1].style.color = 'red';
    } else {
        LI_ALL[i-1].style.color = 'blue';
    }
}
// ----------------------------------------------- 삼항연산자
for(let i=1;i<=LI_length;i++) {
LI_ALL[i].style.color = i % 2 === 0 ? 'blue' : 'red';
}