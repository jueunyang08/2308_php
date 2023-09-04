-- insert 의 기분구조
-- insert into 테이블명 [ (속성1, 속성2) ]
-- values ( 속성값1, 속성값2)

-- 500,000 번째 회원
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
	VALUES (500000, 19660102, 'meerkat', 'green', 'm', NOW());
	
SELECT * FROM employees WHERE emp_no = 500000;

-- 500,000 번째 회원 급여 테이블

INSERT INTO salaries (emp_no, salary, from_date, to_date)
VALUES (500000, 70000, NOW(), 99990101);

SELECT * FROM salaries ORDER BY emp_no DESC;

-- 500,000 번째 회원 소속 부서 데이터 삽입
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES (500000, 'd005', NOW(), 99990101);

SELECT * FROM dept_emp WHERE emp_no = 500000;
-- 500,000 번째 회원 직급 데이터를 삽입해주세요.
INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES (500000, 'Staff', NOW(), 99990101);

SELECT * FROM titles WHERE emp_no = 500000;