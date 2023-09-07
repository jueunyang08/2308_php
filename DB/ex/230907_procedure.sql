-- 1. 스토어드 프로시저 (stored procedure)
-- 일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합

-- 2. 스토어드 프로시저의 장점
-- 하나의 요청으로 여러 sql문을 실행하여, 네트워크에 대한 부하 감소
-- 미리 구문 분석 및 내부 중간 코드로 변환을 끝내야 하므로 처리 시간이 감소
-- 데이터베이스 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가 가능

-- 3. 스토어드 프로시저의 단점
-- 사양 변경 시 외부 응용 프로그램과 함께 프로시저의 정의 변경이 필요
-- 코드 자산으로서 재사용성이 매우 비효율적

-- 4. 프로시저 확인
SHOW PROCEDURE STATUS;

-- 5. 프로시저 생성
delimiter $$
CREATE PROCEDURE test()
BEGIN
	SELECT e.*, t.title 
FROM employees e
	JOIN titles t
	ON e.emp_no = t.emp_no
	AND to_date >= NOW();
END $$
delimiter;

CALL test();

DROP PROCEDURE test;

-- 스토어드  함수 생성
 delimiter $$
 CREATE FUNCTION 함수명 (매개변수명 데이터타입)
 	RETURNS 데이터타입
BEGIN
	RETURN 반환값
END $$
delimiter;

--

delimiter $$
 CREATE FUNCTION my_sum(num1 INT, num2 INT)
 	RETURNs INT
BEGIN
	RETURN num1 + num2;
END $$
delimiter;
-- 스토어드 함수 실행

SELECT my_sum(1,2);

