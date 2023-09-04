-- delete 의 기본구조
-- delete from 테이블명 + where 조건

INSERT INTO departments (dept_no, dept_name)
VALUES ('d010', '');

COMMIT;

DELETE FROM departments
WHERE dept_no = 'd010';

-- 사원 정보 테이블, 사원정보가 5000001이상인 사원의 데이터를 모두 삭제해주세요
DELETE FROM employees
WHERE emp_no >= 500001;