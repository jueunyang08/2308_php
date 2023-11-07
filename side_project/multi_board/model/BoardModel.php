<?php

namespace model;

class BoardModel extends ParentsModel {

    // 보드리스트 정보를 가져오는 메소드
    public function getBoardList($arrBoardInfo) {
        $sql =
      " SELECT
        b_no, id, b_title, b_content, img_name, b_create_at, b_update_at
        FROM 
        board 
        WHERE 
        b_type = :b_type
        and
        id = :id
        and
        b_delete_at is null ";

        $prepare = [
            ":b_type" => $arrBoardInfo["b_type"],
            ":id" => $arrBoardInfo["id"]
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
        b_no, id, b_title, b_content, img_name, b_create_at, b_update_at
        FROM 
        board 
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
}

        