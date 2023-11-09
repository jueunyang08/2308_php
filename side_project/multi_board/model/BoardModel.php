<?php

namespace model;

class BoardModel extends ParentsModel {

    // 보드리스트 정보를 가져오는 메소드
    public function getBoardList($arrBoardInfo) {
        $sql =
      " SELECT
        b.b_no, b.id, b.b_title, b.b_content, b.img_name, b.b_create_at, b.b_update_at, u.u_name
        FROM 
        board b
        JOIN user u
        ON b.id = u.id
        WHERE 
        b_type = :b_type
        and
        b_delete_at is null ";

        $prepare = [
            ":b_type" => $arrBoardInfo["b_type"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e) {
            echo "BoardModel->getBoardList Error : ".$e->getmessage();
            exit();
        }
    }


    // 리스트 추가 하는 메소드
    public function insertBoardList($arrBoardInfo) {
        $sql = 
        " INSERT INTO board(
            b_type, id, b_title, b_content, img_name
        )
          VALUES(
            :b_type, :id, :b_title, :b_content, :img_name
        )
        ";

        $prepare = [
            ":b_type" => $arrBoardInfo["b_type"],
            ":id" => $arrBoardInfo["id"],
            ":b_title" => $arrBoardInfo["b_title"],
            ":b_content" => $arrBoardInfo["b_content"],
            ":img_name" => $arrBoardInfo["img_name"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result; 
        }
        catch(Exception $e) {
            echo "BoardModel->insertBoardList Error : ".$e->getmessage();
            exit();
        }
    }

    // 디테일 조회
    
    public function getBoardDetail($arrBoardDetailInfo) {
        $sql =
      " SELECT
      b.b_no, b.id, b.b_title, b.b_content, b.img_name, b.b_create_at, b.b_update_at, u.u_name
      FROM 
      board b
      JOIN user u
      ON b.id = u.id
      WHERE 
      b_no = :b_no
    ";

        $prepare = [
            ":b_no" => $arrBoardDetailInfo["b_no"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e) {
            echo "BoardModel->getBoardDetail Error : ".$e->getmessage();
            exit();
        }
    }

    // delete 처리
    public function postBoardDelete($arrBoardDeleteInfo) {
        $sql =
        " UPDATE board SET b_delete_at = NOW()
        WHERE b_no = :b_no
        and id = :id
        ";

        $prepare = [
            ":b_no" => $arrBoardDeleteInfo["b_no"],
            ":id" => $arrBoardDeleteInfo["id"]
        ];

        try {

            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            /*
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->rowCount(); // 쿼리에 영향을 받은 레코드 수를 반환 // columnCount : select 한 개수
            */
            return $result; // 정상 : 쿼리 결과 리턴
        }
        catch(Exception $e) {
            echo $e->getMessage(); // Exception 
            return false;
            exit(); // 예외발생 : false 리턴
        }
    }
}

        