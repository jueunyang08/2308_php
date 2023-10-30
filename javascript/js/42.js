const NOW = new Date();
let loof1 = new Date();

function my_setTimeout(callback, ms) {
    const NOW = new Date();
    let loof1 = new Date();

    while(loof1 - NOW <= ms) {
        loof1 = new Date();
    }
    callback();

}

// 비동기처리

console.log('A');
setTimeout(() => {
    console.log('B'), 1000
});
console.log('C');

// 콜백 지옥 ( callback hell) (비동기 처리를 동기처리로 구현할때 나타나는 코드의 난잡함)
// 비동기 처리를 동기 처리로 구현
setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C')
        },1000)
    }, 2000)
}, 3000);