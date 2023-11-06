<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->titleBoardName ?></title>
    <link rel="stylesheet" href="/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php require_once("view/inc/header.php"); ?>

<div class="text-center mt-4 mb-4">

        <h1><?php echo $this->titleBoardName ?></h1>
        
          <svg xmlns="http://www.w3.org/2000/svg"
                width="30" height="30" fill="currentColor"
                class="bi bi-plus-square-fill"
                data-bs-toggle="modal"
                data-bs-target="#modalInsert"
                viewBox="0 0 16 16">
          <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
          </svg>
      
       </div>

<!-- 모달테스트 -->
<!-- <div id = 'modal' class="displayNone">
  <div id ='modalW'></div>
  <button id="btnModalClose">닫기</button>
</div> -->

<main>
  <?php
    foreach($this->arrBoardInfo as $item) {
  ?>
    <div class="card">
        <!-- 이미지 없으면 빈문자열로 보내기 -->
        <img src="<?php echo isset($item["img_name"]) ? "/"._PATH_USERIMG.$item["img_name"] : ""; ?>" class="card-img-top" alt="이미지 없음">
        <div class="card-body">
            <h5 class="card-title"><?php echo $item["b_title"] ?></h5>
            <p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..." ?></p>
            <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
        </div>
    </div>
  <?php
  }
  ?>
</main>

<!-- 상세 Modal -->

<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">개발자입니다.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>살려주세요</span>
        <br><br>
        <img src="/view/img/AurelionSol_0.jpg" class="card-img-top">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- 글 작성 Modal -->
<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/board/add" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
        <div class="modal-header">
          <input type="text" name="b_title"class="form-control" placeholder="제목을 입력하세요">
        </div>
        <div class="modal-body">
          <textarea class="form-control" name="b_content" id="exampleFormControlTextarea1" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
        <br><br>
        <input type="file" name="img_name" accept="image/*">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          <button type="submit" class="btn btn-primary">작성</button>
        </div>
    </form>
    </div>
  </div>
</div>


<footer class ='bg-dark text-light fixed-bottom text-center p-3'>저작권</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/view/js/common.js"></script>
</body>
</html>