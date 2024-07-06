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
    
    // -----------PRODUCTS----------------------
    'list-product' => (new ProductController()) -> list(), /* READ */
    'create-product' => (new ProductController()) -> create(), /* CREATE */
    'read-one-product' => (new ProductController()) -> readOneProduct(), /* UPDATE */
    'delete-product' => (new ProductController()) -> deleteProduct(), /* DELETE */
    // ---
    'view-product-detail' => (new ProductController()) -> listProductDetail(), /* READ */
    'create-product-detail' => (new ProductController()) -> createProductDetail(), /* CREATE */
    'update-product-detail' => (new ProductController()) -> readOneProductDetail(), /* UPDATE */
    'delete-product-detail' => (new ProductController()) -> deleteProductDetail(), /* DELETE */

    // -----------CATEGORIES---------------------
    'list-category' => (new CategoryController()) -> list(),
    // 'create-category' => (new CategoryController()) -> create(),
    // 'update-category' => (new CategoryController()) -> update(),

    // -----------ACCOUNTS-----------------------
 

    // -----------BILLS--------------------------
  
  };











?>
