function getItem() {
    let apiUrl = "http://localhost:8000/api/item"
    fetch(apiUrl) // 서버 url, 패치 실행 후 then 파라미터 받을 수 있음
    .then(response => response.json())
    .then(data => {
        let content = data.data[0].content;
        // JSON 데이터 내에 date 0번 인덱스의 content
        let cp = document.createElement('p');
        cp.innerHTML = content;
        document.body.appendChild(cp);
    })
    .catch(error => console.log(error));
}
// 게시글 작성
function addItem() {
    fetch('http://localhost:8000/api/item', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "data" : {
                "content": "안녕하세요"
            } 
        })
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
}
// 게시글 수정
function editItem() {
        fetch('http://localhost:8000/api/item/2', {
            method: 'PUT',
            // 통신할때 필요한 값들을 세팅해두는 영역
            headers: { 
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                "data" : {
                    "complted": "1"
                } 
            })
        })
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.log(error))
}
//게시글 삭제
function destroyItem() {
    fetch('http://localhost:8000/api/item/2', {
        method: 'DELETE',
    })
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.log(error))
}