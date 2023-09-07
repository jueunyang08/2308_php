-- 1. view 란?
-- 가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용.
-- 여러테이블을 조인 할 시에 view를 생성하여, 복잡한 SQL을 편리하게 조회할수있는 장점이 있다
-- 단점 : index를 사용할수 없어 조회속도가 느리다.

-- 2. view 생성 
-- create [or replace] view 뷰 명
-- as
-- 	select 문
-- ;
-- **or replace : 기존의 뷰가 있을 경우 덮어쓰기를 합니다.

SELECT e.*, t.title,
	 case t.to_date
	 when 99990101 then '0' ELSE '1' END AS exp_date  
FROM employees e
	JOIN titles t
	ON e.emp_no = t.emp_no
	AND to_date >= NOW(); 
	
	CREATE VIEW view_employees_emp
	as
SELECT e.*, t.title 
FROM employees e
	JOIN titles t
	ON e.emp_no = t.emp_no
	AND to_date >= NOW();
	
	SELECT * FROM view_employees_emp;
	
	