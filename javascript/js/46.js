// 1. async $ await 란?
// 비동기처리를 좀 더 가독성 좋고 편하게 쓰기위해 promise를 사용했는데,
// promise 또한 체이닝이 계속 될 경우 코드가 난잡해 질수 있어 async $ await가 도입
// async $ awaitsms promise를 기반으로 동작 합니다.

// // 체이닝 (메소드를 . 으로 연결해서 쓰는 것)

function PRO3(str, ms) {
    return new Promise( function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

// PRO3('PRO3 A', 3000) 
// .then(()=> PRO3('B', 2000))
// .then(()=> PRO3('C', 1000))


// PRO3('PRO3 A', 3000) 
// .then(()=> {
//     PRO3('B', 2000)
//     .then(()=> PRO3('C', 1000))
// })

async function test() {
    await PRO3('A', 3000);
    await PRO3('B', 1000);
    await PRO3('C', 2000);
}

// 병렬처리 하는 방법 : promise.all()

function PRO4(str, ms) {
    return new Promise( function(resolve) {
        setTimeout(() => {
            resolve(str);
        }, ms);
    });
}

async function test2() {
    return Promise.all([PRO4('A', 3000), PRO4('B',2000), PRO4('C', 1000)])
            .then(  () => '처리완료' );
}
const NOW = new Date();

test2()
.then( data => {
    console.log(data);
    const NOW2 = new Date();
    console.log(NOW2-NOW);
}); 
