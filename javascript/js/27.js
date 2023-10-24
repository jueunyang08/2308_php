let arr = [1,2,3,4,5];

// push() : 배열에 값을 추가
arr.push(6);
// > (6) [1, 2, 3, 4, 5, 6]

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(4,1); // (a, : 몇 인덱스부터 b : 몇개를 삭제 하겠다) 배열의 arr[2]를 삭제

arr.splice(2, 0, 10); // 배열의 arr[2]에 값이 '10'인 인덱스를 추가
// > (7) [1, 2, 10, 3, 4, 5, 6]

arr.splice(2, 1, 11); // 배열의 arr[2]부터 '1'개를 삭제하고 '10'을 추가
// > 동시실행 (7) [1, 2, 11, 3, 4, 5, 6] 
// >         (6) [1, 2, 11, 4, 5, 6]

// arr.splice(2,0,10,11,12,13); // 3번째 부터는 파라미터 추가

// arr.indexOf(4); // 해당 값이 들어가있는 인덱스 번호를 출력

// lastIndexOf() : 배열에서 특정 요소중 가장 마지막에 위치한 요소를 찾는데 사용
// arr = [1,1,1,3,4,5,6,6,6,10];
