<?php

// Nhúng các file cần dùng vào

  // File common
  include "../common/env.php";
  include "../common/function.php";

//file trong controller
include "controller/categoryController.php";

//file trong model
include "model/category.php";
include "model/categoryQuery.php"; 


// Người dùng hệ thống sẽ tưởng tác với website bằng url thông qua tham số act 
$act = $_GET['act'] ?? "";
$id = $_GET['id'] ?? "" ;

match ($act) { 
    '' => (new CategoryController()) -> list(),
    // -----------Sản phẩm

    // -----------Danh mục
    'list-category' => (new CategoryController()) -> list(),
    // 'create-category' => (new CategoryController()) -> create(),
    // 'update-category' => (new CategoryController()) -> update(),
    // -----------Tài khoản
 
    // -----------Hóa đơn
  
  };











?>
