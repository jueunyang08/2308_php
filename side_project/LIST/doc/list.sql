-- 데이터 베이스 생성
CREATE database LIST;

-- 테이블 생성
CREATE TABLE list_table(
l_No INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(30) NOT NULL,
contents VARCHAR(500) NOT NULL,
create_at DATETIME DEFAULT CURRENT_TIMESTAMP,
update_at DATETIME,
delete_at DATETIME
);
-- insert
INSERT INTO list_table VALUE (1, '제목', '내용', NOW(), NOW(), NOW());