-- 1. 사원 정보 테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date, sup_no)
VALUES (500001, DATE(19970703), 'yang', 'jueun', 'F', DATE(20230817), NULL);
-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO salaries(emp_no, salary, from_date, to_date)
VALUES (500001, 1000000, DATE(20230817), date(99990101));

INSERT INTO titles(emp_no, title, from_date, to_date)
VALUES (500001, 'staff', DATE(20230817), date(99990101));

INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date)
VALUES (500001, 'd001',  DATE(20230817), date(99990101));
-- 3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date, sup_no)
VALUES (500002, DATE(19970702), 'shin', 'hocheol', 'M', DATE(NOW()), NULL);

INSERT INTO salaries(emp_no, salary, from_date, to_date)
VALUES (500002, 1, DATE(NOW()), date(99990101));

INSERT INTO titles(emp_no, title, from_date, to_date)
VALUES (500002, 'driver', DATE(NOW()), date(99990101));

INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date)
VALUES (500002, 'd003',  DATE(NOW()), date(99990101));
-- 4. 나와 짝궁의 소속부서를 d009로 변경해주세요.

UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no = 500001;

UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no = 500002;


-- 5. 짝궁의 모든 정보를 삭제해 주세요.\
DELETE FROM employees WHERE emp_no = 500002;
-- 6. 'd009' 부서의 관리자를 나로 변경해주세요.
UPDATE dept_manager
SET emp_no = 500001
WHERE dept_no = 'd009' AND to_date >= NOW();
-- 7. 오늘 날짜부로 나의 직책을 'senior Engineer' 로 변경해주세요.
UPDATE titles
SET from_date = date(NOW()), title = 'Senior Engineer'
WHERE emp_no = 500001;
-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해주세요.
SELECT e.emp_no, e.first_name, s.salary
FROM employees e
JOIN salaries s
ON e.emp_no = s.emp_no
WHERE salary = (SELECT MAX(salary) FROM salaries)
OR
salary = (SELECT MIN(salary) FROM salaries);

CREATE INDEX idx_test ON salaries(salary);


-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT e.*, floor(AVG(s.salary))
FROM employees e
JOIN salaries s
ON e.emp_no = s.emp_no
GROUP BY emp_no;
-- ------------------
SELECT AVG(salary)
FROM salaries;
-- 10. 사번이 499,975 인 사원의 지금까지 평균 연봉을 출력해주세요.

SELECT AVG(salary)
FROM salaries
WHERE emp_no = 499975;

SELECT e.*, floor(AVG(s.salary))
FROM employees e
JOIN salaries s
ON e.emp_no = s.emp_no
GROUP BY emp_no HAVING emp_no = 499975;