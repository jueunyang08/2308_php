const NOW = document.querySelector('p')
// 현재 시간 출력 (카운트)
time();
let set = setInterval(time, 1000);

const NOW2 = new Date();

function time() {
    let now = new Date;
                NOW.innerHTML = ('현재시간 : ') + now.toLocaleTimeString();
}
// 날짜 출력 양식 작성

let hour = NOW2.getHours();
let minute = NOW2.getMinutes();
let second = NOW2.getSeconds();
let AMPM = hour > 12 ? '오후' : '오전';
hour = hour > 12 ? hour - 12 : hour;
let print_time = 
AMPM + ' ' + add_str_zero(hour) + ':'
           + add_str_zero(minute) + ':'
           + add_str_zero(second);

function add_str_zero(num) {
    return String(num < 10 ? '0' + num : num);
}





// 멈춘 시간

// 3. 멈춰 버튼을 누르면, 시간이 정지할것
const STOP_btn = document.querySelector('#stop');


function f_stop() {
    clearInterval(set);
}

STOP_btn.addEventListener('click', f_stop);
// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로화면에 표시
const RE_btn = document.querySelector('#re');

function f_re() {
    set = setInterval(time, 1000);
}

RE_btn.addEventListener('click', f_re);