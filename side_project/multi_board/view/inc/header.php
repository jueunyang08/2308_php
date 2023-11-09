<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand">MULTI BOARD</a>
              <?php if($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist") { ?>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $this->titleBoardName ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                      <?php
                        foreach ($this->arrBoardNameInfo as $item){
                      ?>
                        <li><a class="dropdown-item" href="/board/list?b_type=<?php echo $item["b_type"] ?>"><?php echo $item["b_name"] ?></a></li>
                     <?php 
                        }
                      ?>
                    </ul>
                  </li>
                </ul>
                <span class="text-warning"><?php echo isset($_SESSION["u_name"]) ? ($_SESSION["u_name"]) : ""; ?></span>
                <a class='nav-link text-light' href="/user/logout" role="button">로그아웃</a>
              </div>
              <?php } ?>
            </div>
          </nav>
    </header>