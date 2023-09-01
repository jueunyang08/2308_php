-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees;
SELECT * FROM dept_emp;

SELECT first_name, last_name FROM employees;
SELECT emp_no, title FROM titles;
-- SELECT [컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- [쿼리 조건] : 컬럼명 [=,>,<] 조건 값
SELECT * FROM employees WHERE emp_no=10009;
SELECT * FROM employees WHERE first_name = 'mary';
-- maria DB date type : '숫자', 숫자 / 다른 DB DATE(YYYYMMDD 
SELECT * from employees WHERE birth_date < 19600101;
-- and 연산자 
SELECT * from employees WHERE birth_date < 19600101 AND birth_date >=19550101;
SELECT * FROM employees WHERE first_name = 'mary' OR last_name = 'piazza';

SELECT * FROM employees WHERE emp_no >= 10005 AND emp_no<=10010;
SELECT * FROM employees WHERE emp_no BETWEEN 10005 AND 10040; -- 지속시간 느림

SELECT * FROM employees WHERE emp_no=10005 OR emp_no=10010; 
SELECT * FROM employees WHERE emp_no IN(10005, 10010); -- or 보다 지속시간 느림

SELECT * FROM employees WHERE first_name LIKE ('%Ge%'); -- ~와 같은 ★많이씀★
SELECT * FROM titles WHERE title LIKE ('staff'); -- 지속시간 느림
SELECT * FROM titles WHERE title = 'staff';

SELECT * FROM employees WHERE first_name LIKE ('___ge_');
-- order by로 정렬하여 조회
SELECT * FROM employees ORDER BY birth_date ASC; --기본값 오름차순
SELECT * FROM employees ORDER BY birth_date DESC; -- 내림차순

-- 처음 적는 컬럼명이 먼저 정렬됌
SELECT * FROM employees ORDER BY first_name, birth_date, last_name;

SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_date;
-- DISTINCT : 중복되는 레코드 없이 조회 (셀렉트 뒤에 옴)
INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
COMMIT;

SELECT * FROM salaries;
SELECT DISTINCT * FROM salaries;
-- 5. 집계 함수
-- sum 합계를 구함 sum(컬럼명)
SELECT sum(salary) FROM salaries;
SELECT * FROM salaries WHERE to_date >= 230901;
-- max 최대값을 구함
SELECT max(salary) FROM salaries WHERE to_date >= 230901;
-- min 최소값을 구함
SELECT min(salary) FROM salaries WHERE to_date >= 230901;
-- AVG 평균을 구함
SELECT AVG(salary) FROM salaries WHERE to_date >= 230901;
-- COUNT(컬럼명):개수를 구함
SELECT COUNT(emp_no) FROM employees;
-- 이름이 mary인 사람의 수를 구해주세요.
SELECT COUNT(first_name) FROM employees WHERE first_name = 'mary';


SELECT COUNT(*) FROM titles WHERE title = 'engineer';
SELECT title, COUNT(title) FROM titles WHERE to_date >= 20230901 GROUP BY title
HAVING title LIKE('%staff%');

SELECT tilte COUNT(title) AS cnt
FROM titles
WHERE title = 'engineer';
-- AS 컬럼명 바꾸기
SELECT title, COUNT(title) AS cnt
FROM titles WHERE to_date >= 20230901 GROUP BY title
HAVING title LIKE('%staff%');
-- CONCAT() : 문자열을 합쳐주는 함수 (합쳐주고싶은 문자열을 순서대로 배치)
SELECT CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees
GROUP BY emp_no;

SELECT emp_no, birth_date, CONCAT(first_name, ' ', last_name) AS FULL_name FROM employees WHERE gender = 'F'
ORDER BY FULL_name ASC;

-- limit : n개만 보고싶다. offset : ~부터
SELECT * FROM employees ORDER BY emp_no
LIMIT 10 OFFSET 20;

-- 재직중인 사원들중 급여가 상위 5위까지 출력해주세요.
SELECT * FROM salaries WHERE to_date >= 20230901 ORDER BY salary DESC
LIMIT 5;

-- 서브쿼리 : 쿼리안에 또다른 쿼리가 있는 형태
-- d002 부서의 현재 매니저의 정보를 가져오고 싶다.
SELECT *
FROM employees
WHERE emp_no = (
SELECT emp_no FROM dept_manager WHERE to_date >= 20230901
AND dept_no = 'd002');

-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해주세요.
SELECT * FROM salaries ORDER BY salary DESC;

SELECT emp_no, CONCAT(first_name, ' ', last_name) AS FULL_name FROM employees WHERE emp_no =
(SELECT emp_no FROM salaries where to_date >= 20230901 ORDER BY salary DESC LIMIT 1);

SELECT emp_no, CONCAT(first_name, ' ', last_name) AS FULL_name FROM employees WHERE emp_no
in (SELECT emp_no FROM dept_manager WHERE dept_no = 'd001' OR dept_no = 'd002');
-- 현재 직책이 senior Engineer 인 사원의 사번과 생일을 출력해주세요.

SELECT emp_no, birth_date FROM employees WHERE emp_no in
(SELECT emp_no FROM titles WHERE to_date >= 20230901 and title = 'Senior Engineer');

-- 다중열 서브쿼리
-- 현재 부서장인 사람의 소속부서 테이블의 모든 정보를 출력해주세요
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (SELECT dept_no, emp_no FROM dept_manager WHERE to_date >= NOW());

-- select 절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기시작한 일자, 풀네임을 출력해주세요.
SELECT
	sal.salary, sal.from_date,
	(SELECT CONCAT(emp.first_name, ' ', emp.last_name)
	FROM employees AS emp
	WHERE sal.emp_no = emp.emp_no) AS full_name
FROM salaries AS sal WHERE to_date >=NOW();

-- from 절에 오는 서브쿼리
SELECT emp.*
FROM ( SELECT * FROM employees WHERE gender = 'm') AS emp;