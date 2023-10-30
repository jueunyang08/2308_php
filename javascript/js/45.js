/*
1. promise 객체
- 비동기 프로그래밍의 근간이 되는 기법 중 하나
프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어가능
promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체

*/

// 프로미스는 파라미터가 정해져있음. resolve, reject

// 1. 프로미스1 처리 방식
const PROMISE1 = new Promise(function(resolve, reject) {
let flg = false;
    if(flg) {
        return resolve('성공'); // 요청 성공 시 resolve()를 호출
    } else {
        return reject('실패'); // 요청 실패 시 reject()를 호출
    }
});
// 2. then catch finally
PROMISE1
.then(data => console.log(data))
.catch(err => console.log(err))
.finally(() => console.log('finally입니다.')) // 어떤 소스코드든 다 실행


function PRO2() {
    return new Promise(function(resolve, reject) {
        let flg = false;
            if(flg) {
                return resolve('성공'); // 요청 성공 시 resolve()를 호출
            } else {
                return reject('실패'); // 요청 실패 시 reject()를 호출
            }
        });
}

PRO2()
.then()
.catch()
.finally()

// const PRO2 = function(ms) {
//     return new Promise( (resolve) => {
//         setTimeout(() => resolve(ms), ms);
//     })
// }

// PRO2(1000)
// .then(data => )

function PRO3(str, ms) {
    return new Promise( function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

PRO3('PRO3 A', 3000) //프로미스 객체에 있는 메소드
.then(()=> PRO3('B', 2000))
.then(()=> PRO3('C', 1000))
