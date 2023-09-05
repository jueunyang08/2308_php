

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

	