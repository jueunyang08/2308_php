<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {
    protected $arrBoardInfo;
    protected $titleBoardName;
    protected $boardType;
    
    // 게시판 리스트 페이지
    protected function listGet() {
        // 파라미터 세팅 
        $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";
    
        // Board 정보
        $arrBoardInfo = [
            "b_type" => $b_type
        ];

        // 페이지의 제목 셋팅
        foreach($this->arrBoardNameInfo as $item) {
            if($item["b_type"] === $b_type) {
                $this->titleBoardName = $item["b_name"];
                $this->boardType = $item["b_type"];
                break;
            } 
        }

        //모델 인스턴스
        $boardModel = new BoardModel();

        // board 리스트 획득
        $this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo);

        // 사용한 모델 파기
        $boardModel->destroy();

        return "view/list.php";
    }

    // 글작성
    protected function addPost() {
        // 파라미터 세팅
        // $b_type = isset($_POST["b_type"]) ? $_POST["b_type"] : "0";
        // $id = $_SESSION["id"];
        // $b_title = isset($_POST["b_title"]) ? trim($_POST["b_title"]) : "";
        // $b_content = isset($_POST["b_content"]) ? trim($_POST["b_content"]) : "";
        // $img_name = isset($_POST["img_name"]) ? $_POST["img_name"] : "";
        $b_type = $_POST["b_type"];
        $id = $_SESSION["id"];
        $b_title = $_POST["b_title"];
        $b_content = $_POST["b_content"];
        $img_name = $_FILES["img_name"]["name"];

        // insert 정보
        $insertBoardInfo = [
            "b_type" => $b_type,
            "id" => $id,
            "b_title" => $b_title,
            "b_content" => $b_content,
            "img_name" => $img_name
        ];

        // 이미지 파일 저장
        move_uploaded_file($_FILES["img_name"]["tmp_name"], _PATH_USERIMG.$img_name);

        
        // 인서트 처리

        $boardModel = new BoardModel(); //모델 인스턴스
        $boardModel->beginTransaction();
        $result = $boardModel->insertBoardList($insertBoardInfo);
        if($result !== true) {
            $boardModel->rollBack();
        }else {
            $boardModel->commit();
        }


        // 사용한 모델 파기
        $boardModel->destroy();

        return "Location: /board/list?b_type=".$b_type;   
    }

    // 상세 정보 API (보드 리스트 상세)
    protected function detailGet() {
        $b_no = $_GET["b_no"];

        $arrBoardDetailInfo = [
            "b_no" => $b_no
        ];

        $boardModel = new BoardModel();
        $result = $boardModel->getBoardDetail($arrBoardDetailInfo);

        // 이미지 패스 재설정
        $result[0]["img_name"] = "/"._PATH_USERIMG.$result[0]["img_name"];
    
        // 에러 메세지 배열 객체
        $arrTmp = [
            "errflg" => "0",
            "msg" => "",
            "data" => $result[0]
        ];

        $response = json_encode($arrTmp); // 제이슨 형태로 변환

        // response 처리
        header("Content-type: application/json"); // 응답을 해서 줄건데, 그타입이 json 타입이다.
        echo $response;
        exit();

    }

}