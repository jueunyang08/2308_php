-- 0. index?
--  데이터베이스 테이블에 대한 검색 성능의 속도를 높여주는기능 
-- 인덱스 생성시 데이터를 오름차순으로 정렬
-- 일반적으로 db 에서는 b+ tree인덱스 방식을 사용
 SHOW INDEX FROM employees;
 
 -- index 생성 
 -- create index 인덱스명 on 테이블(컬럼1,컬럼2...);
 CREATE INDEX idx_employees_last_name ON employees(last_name);
 DROP INDEX idx_employees_last_name ON employees;
 
 
 