-- 숫자 데이터 형식
-- INT : 4byte 정수 +- 21억
-- BIGINT : 8byte 정수 +-900경
-- FLOAT : 4byte 실수 소수점 아래 7자리 까지 표현 
-- DOUBLE : 8byte 실수 소수점 아래 15자리 까지 표현
-- DECIMAL : 5~15 byte, 소수점 아래 자리를 지정가능ex) decimal(6,2)

-- 문자 데이터 형식
-- CHAR(n) : 1~255byte 정수n만큼 고정길이를 가지는 문자형 
-- VARCHAR(n) : 1~65535byte, n만큼 가변길이를 가지는 문자형
-- LONGTEXT : 최대 4GB, text 데이터 값을 저장
-- LONGBLOB : 최대 4GB, BLOB 데이터 값을 저장
-- ENUM(값1, 값2, 값3, ...) : 정해진 값만 입력 가능하도록 하는 데이터 형식 **데이터의 무결성 **

-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'yyyy-mm-dd' 1001-01-01 ~ 9999-12-31 저장 가능
-- DATETIME : 8byte, 'yyyy-mm-dd hh:mi:ss' 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59
-- TIMESTAMP : 4byte,  'yyyy-mm-dd hh:mi:ss'  1001-01-01 00:00:00 ~ 9999-12-31 23:59:59
-- **주의 ** DATETIME : 날짜와 시간 데이터가 내가 입력한 값으로 고정
	--        TIMESTAMP : 서버 시간에 따라 유동적으로 변하는 타입
