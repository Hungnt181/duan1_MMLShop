<?php

// Nhúng các file cần dùng vào

  // File common
  include "../common/env.php";
  include "../common/function.php";

//file trong controller
include "controller/categoryController.php";
include "controller/productController.php";

//file trong model
include "model/category.php";
include "model/categoryQuery.php"; 
include "model/product.php";
include "model/productQuery.php";


// Người dùng hệ thống sẽ tưởng tác với website bằng url thông qua tham số act 
$act = $_GET['act'] ?? "";
$id = $_GET['id'] ?? "" ;

match ($act) { 
    '' => (new CategoryController()) -> list(),
    // -----------Sản phẩm
    'list-product' => (new ProductController()) -> list(),
    'create-product' => (new ProductController()) -> create(),
    // -----------Danh mục
    'list-category' => (new CategoryController()) -> list(),
    // 'create-category' => (new CategoryController()) -> create(),
    // 'update-category' => (new CategoryController()) -> update(),
    // -----------Tài khoản
 
    // -----------Hóa đơn
  
  };











?>
