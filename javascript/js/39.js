// 1. DOM (Document Object Model)
// 웹 문서를 제어하기위해 웹 문서를 객체화 한 것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작가능

// 2. 요소 선택
// 2-1. 고유한 ID로 요소를 선택 getElementById
const TITLE = document.getElementById('title');
const SUBTITLE = document.getElementById('subtitle');

TITLE.style.color = 'blue'; // document. style 로 접근 했을때, 무조건 인라인으로 들어감

// 2-2 태그명으로 요소를 선택 getElementsByTagName
const H2 = document.getElementsByTagName('h2') // collection 객체 (다수이기때문에)

// 첫번째 h2 태그를 가져올때 -> H2[0]

// 2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');
// NONE[0].style.color = 'red';

// 2-4. CSS 선택자를 사용해 요소를 찾는 메소드
const S_ID = document.querySelector('#subtitle');
const S_NONE = document.querySelector('.none-li'); // querySelector : 복수일 경우 가장 첫번째 요소만 선택
const S_NONE_ALL = document.querySelectorAll('.none-li'); // querySelector : 복수일 경우 가장 첫번째 요소만 선택

for(let i=0; i < NONE.length; i++) { // 해당 변수에 담긴 요소 전체 적용
    NONE[i].style.color='red';
}

// ---------------
// 3. 요소 조작
// ---------------

// textContent : 순수 텍스트 데이터 전달, 이전 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>'
// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
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