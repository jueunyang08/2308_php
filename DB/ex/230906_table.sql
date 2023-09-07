

-- auto_increment : 숫자 1부터 insert시 +1 증가
CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT,
	id VARCHAR(30) UNIQUE not NULL,
	mem_name VARCHAR(30) not NULL,
	addr VARCHAR(100) not NULL
);

CREATE TABLE points (
	mem_no INT PRIMARY KEY,
	p INT NOT NULL DEFAULT(0),
	CONSTRAINT fk_points_mem_no foreign KEY(mem_no)
	REFERENCES members(mem_no) ON DELETE cascade
);


CREATE TABLE product_list (
	product_no int PRIMARY KEY,
	product_name VARCHAR(100) NOT NULL,
	product_price INT NOT null
);
CREATE TABLE order_list (
	order_no INT PRIMARY KEY,
	mem_no INT not null,
	product_no INT not NULL,
	order_count INT NOT NULL,
	amount INT NOT NULL,
	CONSTRAINT fk_order_list_mem_no FOREIGN KEY(mem_no)
	REFERENCES members(mem_no) ON DELETE cascade,
	CONSTRAINT fk_order_list_product_no FOREIGN KEY(product_no)
	REFERENCES product_list(product_no)	ON DELETE NO action
);

INSERT INTO MEMBERs(id, mem_name, addr)
VALUES('user1','kimhoho','korea deagu');
INSERT INTO points(mem_no)
VALUES(1);

CREATE DATABASE M;
USE m;

-- 테이블 변경 
-- 컬럼 추가 : alter table 테이블명 add column 컬럼 데이터타입;
ALTER TABLE members ADD COLUMN age INT NOT NULL;
-- 컬럼 데이터 타입 변경 : alter table 테이블명 alter column 컬럼 데이터타입;
ALTER TABLE members modify COLUMN mem_name VARCHAR(50) not NULL;
-- 컬럼 삭제 : alter table 테이블명 drop column 컬럼;
ALTER TABLE members DROP COLUMN age;

-- 테이블의 데이터 삭제 : truncate table 테이블명;

-- ALTER TABLE 테이블명 ADD CONSTRAINT fk명 FOREIGN KEY(컬럼명)
USE m;
ALTER TABLE order_list DROP CONSTRAINT fk_order_list_mem_no;

ALTER TABLE order_list ADD CONSTRAINT fk_order_list_mem_no FOREIGN KEY(mem_no)
	REFERENCES members(mem_no) ON DELETE CASCADE;
