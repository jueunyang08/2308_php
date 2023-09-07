-- 1. auto_increment 란 ?
-- 자동 증가 값을 가지는 컬럼으로 값을 직접 대입할수 없습니다.
-- 중간에 값을 삭제한다고 해서, 삭제된 값을 재사용하지 않으며
-- 레코드 적재될때마다 1 씩 증가하게 됩니다.
-- pk 에만 적용 가능.

-- ALTER TABLE members MODIFY mem_no INT ~ 
