<?php

namespace model;

class UserModel extends ParentsModel {
    // 특정 유저를 조회하는 메소드
    public function getUserInfo($arrUserInfo, $pwFlg = false) {
        $sql = 
        " select "
        ." * "
        ." FROM "
        ." user "
        ." where "
        ." u_id = :u_id ";

        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
        ];

        // PW 추가처리 
        if($pwFlg) {
            $sql .= " AND u_pw = :u_pw ";
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        }
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e) {
            echo "UserMpdel->getUserInfo Error : ".$e->getmessage();
            exit();
        }

    }
}