function deLete() {
    if(confirm('삭제하시겠습니까?')) {
            alert('정상적으로 삭제 되었습니다.');
            return true;
    } else {
            return false;
    }
};

let test;
// 상세 모달 제어
function openDetail(b_no) {
    const URL = '/board/detail?b_no='+b_no;
    console.log(URL);
    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        // 요소에 데이터 세팅
        const TITLE = document.querySelector('#b_title');
        const CONTENT = document.querySelector('#b_content');
        const IMG = document.querySelector('#img_name');
        const CREATE_AT = document.querySelector('#b_create_at');
        const UPDATE_AT = document.querySelector('#b_update_at');
        const WRITER = document.querySelector('#u_name');
        const BNO = document.querySelector('#b_no');
        const DEL_BTN = document.querySelector('#btn_dle');
        const UPDATE_BTN = document.querySelector('#btn_update');

        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = '내용 : ' + data.data.b_content;
        CREATE_AT.innerHTML = '작성일 : ' + data.data.b_create_at;
        UPDATE_AT.innerHTML = '수정일 : ' + data.data.b_update_at;
        WRITER.innerHTML = '작성자 : ' +data.data.u_name;
        IMG.setAttribute('src', data.data.img_name);
        BNO.value= data.data.b_no;

        // 삭제 버튼 제어
        if(data.data.uflg === "1") {
            DEL_BTN.classList.remove('d-none');
            UPDATE_BTN.classList.remove('d-none');
        } else {
            DEL_BTN.classList.add('d-none');
            UPDATE_BTN.classList.add('d-none');
        }


        // 모달 오픈
        openModal();
    })
    .catch( error => console.log(error) )
}
// 모달 오픈 함수
function openModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('show');
    MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7)';
}

// 모달 닫기 함수
function closeDetailModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('remove');
    MODAL.style = 'display: none;'
}

function Checkid() {
    const USERID = document.querySelector('#u_id').value;
    const URL = '/user/idchk?u_id='+USERID;
    const MSG = document.querySelector('#check_msg');

    console.log(URL);
    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        if(data.msg !== "") {
            MSG.innerHTML=data.msg;
        } else {
            if(data.data===1) {
                MSG.innerHTML='사용 불가능한 아이디 입니다.';
                MSG.classList ='text-danger fw-normal';
                MSG.style.fontSize = '12px';
            } else {
                MSG.innerHTML='사용 가능한 아이디 입니다.';
                MSG.classList ='text-success fw-normal';
                MSG.style.fontSize = '12px';
            }
        }
        
       
    })
    .catch( error => console.log(error) )
}

// 삭제처리

function deleteCard() {
    const B_PK = document.querySelector('#del_id').value;
    const URL = '/board/remove?b_no=' + B_PK;

    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        if(data.errflg === "0") {
            // 모달 닫기
            closeDetailModal();

            // 카드 삭제
            const MAIN = document.querySelector('main');
            const CARD_NAME = '#card' + data.id;
            const DEL_CARD = document.querySelector(CARD_NAME);
            MAIN.removeChild(DEL_CARD);
        } else {
            alert(data.msg);
        }
    })
    .catch( error => console.log(error) )
}