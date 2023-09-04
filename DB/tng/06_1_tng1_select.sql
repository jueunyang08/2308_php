-- 1
SELECT * FROM titles;
-- 2
SELECT DISTINCT emp_no FROM salaries WHERE salary<=60000;
-- 3
SELECT DISTINCT emp_no FROM salaries WHERE salary>=60000 AND salary<=70000;
-- 4
SELECT * FROM employees WHERE emp_no=10001 OR emp_no=10005;
-- 5 
SELECT emp_no, title FROM titles WHERE title LIKE ('%Engineer%');
-- 6
SELECT CONCAT(first_name, ' ', last_name) AS FULL_name FROM employees ORDER BY first_name, last_name;
-- 7
SELECT emp_no, AVG(salary) FROM salaries GROUP BY emp_no;
-- 8
SELECT emp_no, AVG(salary) from salaries GROUP BY emp_no HAVING AVG(salary)>=30000 AND AVG(salary)<=50000;
-- 사원별 급여 평균이 70000이상인, 사원의 사번, 이름, 성, 성별을 출력해주세요.
-- 9 where절
SELECT emp_no, first_name, last_name, gender FROM employees WHERE emp_no 
	IN (select emp_no from salaries GROUP BY emp_no HAVING AVG(salary)>=70000);
-- 9 from 절
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender, sal_avg
FROM employees AS emp
	,(SELECT emp_no, AVG(salary) as sal_avg FROM salaries GROUP BY emp_no HAVING sal_avg>=70000) AS sal
	WHERE emp.emp_no = sal.emp_no;
-- 10
SELECT emp_no, last_name FROM employees WHERE emp_no 
	IN (SELECT emp_no FROM titles WHERE title = 'senior Engineer' AND to_date >=NOW());