<?php

namespace controller;

class BoardController extends ParentsController {
    // 리스트

    protected function listGet() {
        return "view/list.php";
    }
}