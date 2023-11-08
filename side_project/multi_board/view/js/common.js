
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

        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = '내용 : ' + data.data.b_content;
        CREATE_AT.innerHTML = '작성일 : ' + data.data.b_create_at;
        UPDATE_AT.innerHTML = '수정일 : ' + data.data.b_update_at;
        IMG.setAttribute('src', data.data.img_name);

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
        if(data.data===1) {
            MSG.innerHTML='중복';
            MSG.style.color ='red';
        } else {
            MSG.innerHTML='사용가능';
            MSG.style.color ='blue';
        }
    })
    .catch( error => console.log(error) )
}