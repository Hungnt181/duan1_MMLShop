<?php

// Nhúng các file cần dùng vào

  // File common
  include "../common/env.php";
  include "../common/function.php";

//file trong controller
include "controller/categoryController.php";
include "controller/productController.php";
include "controller/newsController.php";
include "controller/accountController.php";
include "controller/commentController.php";
include "controller/billController.php";

//file trong model
include "model/category.php";
include "model/categoryQuery.php"; 
include "model/product.php";
include "model/productQuery.php";
include "model/news.php";
include "model/newsQuery.php";
include "model/account.php";
include "model/accountQuery.php";
include "model/comment.php";
include "model/commentQuery.php";
include "model/bill.php";
include "model/billQuery.php";


// Người dùng hệ thống sẽ tưởng tác với website bằng url thông qua tham số act 
$act = $_GET['act'] ?? "";
$id = $_GET['id'] ?? "" ;

match ($act) { 
  'admin' =>(new CategoryController()) -> list(),
    '' => (new CategoryController()) -> list(),
    
    // -----------PRODUCTS----------------------
    'list-product' => (new ProductController()) -> list(), /* READ */
    'create-product' => (new ProductController()) -> create(), /* CREATE */
    'read-one-product' => (new ProductController()) -> readOneProduct(), /* UPDATE */
    /* 'delete-product' => (new ProductController()) -> deleteProduct(), */ /* DELETE */
    'update-status-product' => (new ProductController()) -> updateStatusProduct(), /* CHANGE STATUS - SOFT DELETE */
    // ---
    'view-product-detail' => (new ProductController()) -> listProductDetail(), /* READ */
    'create-product-detail' => (new ProductController()) -> createProductDetail(), /* CREATE */
    'update-product-detail' => (new ProductController()) -> readOneProductDetail(), /* UPDATE */
    /* 'delete-product-detail' => (new ProductController()) -> deleteProductDetail(), */ /* DELETE */
    'update-status-product-detail' => (new ProductController()) -> updateStatusProductDetail(), /* CHANGE STATUS - SOFT DELETE */


    // -----------CATEGORIES---------------------
    'list-category' => (new CategoryController()) -> list(),
    'create-category' => (new CategoryController()) -> create(),
    'update-category' => (new CategoryController()) -> update(),
    'delete-category' => (new CategoryController()) -> delete(),
    'restore-category' => (new CategoryController()) -> restore(),


    // -----------ACCOUNTS-----------------------
    'list-account' => (new AccountController()) -> list(),
    'create-account' => (new AccountController()) -> create(),
    'read-one-account' => (new AccountController()) -> readOneAccount(),
    'update-role-account' => (new AccountController()) -> updateRoleAccount(),
    'update-status-account' => (new AccountController()) -> updateStatusAccount(),


    // -----------BILLS--------------------------
    'list-bill' => (new BillController()) -> list(),
    'view-bill-detail' => (new BillController()) -> readOneBill(),



    // -----------NEWS--------------------------
    'list-news' => (new NewsController()) -> list(),
    'create-news' => (new NewsController()) -> create(),
    'update-news' => (new NewsController()) -> update(),
    'delete-news' => (new NewsController()) -> deleteNews(),
    

    // -----------COMMENTS--------------------------
    'list-comment' => (new CommentController()) -> list(),
    'view-comment-detail' => (new CommentController()) -> readOneComment(),
    'delete-comment' => (new CommentController()) -> delete(),
  };











?>
