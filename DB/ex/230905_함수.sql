-- CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다.
-- 예) CASE 체크하려는 수식1
-- 		WHEN 분기수식1 THEN 결과1
-- 		WHEN 분기수식2 THEN 결과2
-- 		WHEN 분기수식3 THEN 결과3
-- 		WHEN 분기수식1 THEN 결과1

SELECT e.emp_no, e.gender,
		case e.gender when 'm' then '남자' ELSE '여자' END AS ko_gender
FROM employees AS e;

UPDATE titles SET  to_date = NULL
WHERE emp_no=500000;

SELECT * FROM titles ORDER BY emp_no DESC;

-- 직책 테이블의 모든 정보를 출력해 주세요.
-- 단, to_date 가 null | 9999-01-01 인 경우는 '현재직책'
-- 그 외는 '지금은 아님'

SELECT *, case date(ifnull(to_date, 99990101)) when 99990101 then '현재직책'
			 ELSE '지금은아님' END AS 현재직책
FROM titles ORDER BY emp_no DESC;

-- where 조건문에 null은 = 을 인식못함. IS , 아닐경우 NOT NULL

SELECT * FROM titles WHERE to_date IS not NULL;

-- 3. 문자열 함수
SELECT CONCAT ('안녕', '하세요.');
SELECT CONCAT_WS ('.', '딸기', '바나나', '토마토', '수박');
-- FORMAT(숫자, 소수점 자릿수)
SELECT FORMAT(123456,2);
-- LEFT('문자열','길이') 문자열을 왼쪽부터 길이만큼 잘라 반환
SELECT LEFT('123456',3);
-- RIGHT('문자열','길이') 문자열을 오른쪽부터 길이만큼 잘라 반환
SELECT RIGHT ('123456',3);
-- UPPER('문자'열) : 소문자를 대문자로 변경
SELECT UPPER('fsdgfwegf');
-- LOWER('문자열') : 대문자를 소문자로 변경
SELECT LOWER ('FSEFWQFG');
-- LPAD('문자열', 길이, '채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에
SELECT LPAD ('1', 20,'0');
SELECT RPAD ('가나다',10,'0');
-- 좌우 공백을 제거 하는 문자열 함수
SELECT TRIM(' 1243    5  ');
SELECT '  grrgr      ';
SELECT LTRIM ('        fefef           ');
SELECT RTRIM ('           fefef           ');
-- TRIM(LEADING 'fwf' FROM 'fdfwg');
-- substring (문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환합니다.
SELECT SUBSTRING('abcdff', 3, 2);
-- substring_index(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이후로
SELECT SUBSTRING_INDEX('ab.cd.ef.gh', '.', 2);

-- 4. 수학 함수
SELECT CEILING(1.4); -- 올림 합니다.
SELECT FLOOR(1.9); -- 버림 합니다.
SELECT ROUND(1.5); -- 반올립합니다.

-- 5. 날짜 및 시간 함수 
SELECT NOW(), DATE(NOW()), DATE(99990101);
SELECT ADDDATE(99990101, INTERVAL 1 day); -- adddate(날짜1, interval 날짜2) : 날짜1에서 날짜2를 더한 날짜
SELECT SUBDATE(99990101, INTERVAL 1 DAY);

SELECT ADDTIME(20230101000000, '-01:00:00'); -- ADDTIME(날짜시간, '+- 시간')

SELECT ADDDATE(DATE(NOW()), INTERVAL -1 YEAR);

-- 6. 순위 함수
-- RANK() OVER(ORDER BY 속성명 DESC/ASC) : 순위를 매깁니다.
SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM salaries LIMIT 5;

SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM (SELECT emp_no, salary
FROM salaries ORDER BY salary DESC
LIMIT 10);
-- ROW_NUMBER() OVER(ORDER BY 속성명 DESC/ASC): 레도크에 순위를 매깁니다.
SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) AS num
FROM salaries
LIMIT 10;