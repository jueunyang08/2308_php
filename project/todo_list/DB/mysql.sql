USE mysql;

SELECT * FROM USER;

CREATE USER 'team3'@'192.168.0.%' IDENTIFIED BY 'team3';
GRANT ALL PRIVILEGES ON *.* TO 'team3'@'192.168.0.%' IDENTIFIED BY 'team3';

COMMIT;

flush PRIVILEGES;

