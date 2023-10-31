// "https://picsum.photos/v2/list?page=2&limit=5"
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

// 지우기
const BTN_CELAR = document.querySelector('#btn-clear');
BTN_CELAR.addEventListener('click', my_delete);

function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url')

    fetch(INPUT_URL.value.trim())
    .then( response => {
        if(response.status >=200 & response.status<300 ) {
            return response.json();
        }else
        throw new Error('에러');
    })

    .then(data => makeImg(data))
    .catch(error => console.log(error));

    function makeImg(data) {
        data.forEach ( item => {
            const NEW_IMG = document.createElement('img');
            const DIV_IMG = document.querySelector('#div-img');
            const DIV_ID = document.createElement('div');
            const DIV = document.createElement('div');

            DIV_ID.innerHTML=item.id;

            NEW_IMG.setAttribute('src', item.download_url)
            NEW_IMG.style.width = '100%'
            // const DIV_CON = document.querySelector('.div-con')
            DIV_IMG.appendChild(DIV);
            DIV.appendChild(DIV_ID);
            DIV.appendChild(NEW_IMG);

            // DIV_ID.style.backgroundColor='black';
            DIV_ID.style.color='white';
            DIV_ID.style.height='30px';
            DIV_ID.style.textAlign='center';

            DIV.style.padding='10px';
            DIV.style.backgroundColor='black';

            
            
            
        })
    }
}

function my_delete() {
    // 방법1
    
    const IMG = document.querySelectorAll('img');
    for(let i =0; i<IMG.length; i++) {
        IMG[i].remove();
    }
}