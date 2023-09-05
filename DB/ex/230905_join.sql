-- 0. join 이란?
-- 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것 입니다.

-- 1. INNER JOIN의 구조
-- SELECT 컬럼1, 컬럼2
-- FROM 테이블1 INNER JOIN 테이블2
-- ON 조인 조건
-- [WHERE 검색조건]

-- ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★ ★
SELECT emp.emp_no, emp.first_name, emp.last_name, dp.dept_no
FROM employees emp
	JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
		
-- 2. OUTER JOIN :
-- - 기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- select 컬럼1, 컬럼2 ...
-- from 테이블1
-- [ LEFT | RIGHT ] OUTER JOIN 테이블2
-- ON 조인조건
-- WHERE 검색 조건;

SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
		
		WHERE emp.emp_no >= 109999;
		
-- UNION 중복 값을 제거하고 출력하고, UNION ALL은 중복값도 출력합니다.

-- 4. self join : 자기 자신을 조인
-- select 컬럼1, 컬럼2 ...
-- from 테이블1
-- inner join 테이블1
-- where 검색조건;

SELECT emp2.*
FROM employees emp1
	JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;
-- alter table

COMMIT;

ALTER TABLE employees ADD COLUMN sup_no INT(11);

-- 1 사원의 사원번호, 풀네임, 직책명을 출력해 주세요
SELECT e.emp_no, CONCAT(e.first_name, ' ', e.last_name) AS full_name, t.title
FROM employees e
	JOIN titles t
	ON t.emp_no = e.emp_no;
-- 2 사원의 사원번호, 성별, 현재 월급을 출력해 주세요
SELECT e.emp_no, e.gender, s.salary
FROM employees e
	JOIN salaries s
	ON e.emp_no = s.emp_no
	AND s.to_date >= NOW();
-- 3 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력
SELECT e.emp_no, concat(e.first_name, ' ', e.last_name) AS full_name, salary, s.to_date
FROM employees e 
	JOIN salaries s
	ON e.emp_no = s.emp_no
	AND e.emp_no = 10010;
-- 4 사원의 사원번호, 풀네임, 소속부서명 출력
SELECT e.emp_no, concat(e.first_name, ' ', e.last_name) AS full_name, d.dept_name
FROM employees e
	JOIN dept_emp de
	ON de.emp_no = e.emp_no
	JOIN departments d
	ON d.dept_no = de.dept_no
	AND de.to_date >= NOW();
-- 5
SELECT e.emp_no, concat(e.first_name, ' ', e.last_name) AS full_name, s.salary
FROM employees e
	JOIN salaries s
	ON e.emp_no = s.emp_no
	AND s.to_date >= NOW()
ORDER By s.salary DESC LIMIT 10;
-- 6
SELECT d.dept_name, concat(e.first_name, ' ', e.last_name) AS full_name, e.hire_date
FROM employees e 
	JOIN dept_manager dm
	ON e.emp_no = dm.emp_no
	JOIN departments d
	ON dm.dept_no = d.dept_no
	AND dm.to_date >= NOW();
-- 7
SELECT t.title, avg(s.salary) 평균월급
FROM salaries s
	JOIN titles t
	ON s.emp_no = t.emp_no
	AND t.title = 'Staff'
	AND t.to_date >= NOW()
	AND s.to_date >= NOW()
GROUP BY t.title;
-- 8
SELECT concat(e.first_name, ' ', e.last_name) AS full_name, e.hire_date, e.emp_no, dm.dept_no
FROM employees e
	JOIN dept_manager dm
	ON e.emp_no = dm.emp_no;
-- 9 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력
SELECT title, truncate(avg(s.salary), 0) avg_sal
FROM titles t
	JOIN salaries s
		ON t.emp_no = s.emp_no
		AND t.to_date >= NOW()
		AND s.to_date >= NOW()

GROUP BY t.title HAVING avg_sal >= 60000
ORDER BY avg_sal DESC;

-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력
SELECT title, COUNT(title)
FROM titles t
	JOIN employees e
	ON t.emp_no = e.emp_no
	AND t.to_date >= NOW()
WHERE e.gender = 'F'
GROUP BY title;
-- 11. 퇴사한 여직원의 수
SELECT e.gender, COUNT(*)
FROM employees e
	JOIN (SELECT emp_no
			FROM titles t
			GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101) tit
	ON e.emp_no = tit.emp_no
	GROUP BY e.gender;

	