<?php

// Nhúng các file cần dùng vào


//Common

include "common/env.php";
include "common/function.php";
// Nhứng troàn bộ các file controller
include "controller/HomeController.php";
include "admin/controller/categoryController.php";

// Nhứng troàn bộ các file model


include 'admin/model/product.php';
include "model/productQuery.php";


include "admin/model/category.php"; 
include "admin/model/categoryQuery.php"; 

// Thông tin act
$act = $_GET['act'] ?? '' ;
$id = $_GET['id']  ?? '';

// if(!isset($_SESSION["myCart"])) {
//   $_SESSION["myCart"] = [];
// }

match ($act) {
    '' => (new HomeController())->home(),
    // 'login' => (new LoginController()) ->login(),
    // 'logout' => (new LoginController()) ->logout(),
    // 'dangky' => (new LoginController()) ->dangky(),
    // 'cart' =>  (new HomeController())->cart(),
    'ctsp' => (new HomeController()) -> ctsp(),
    // 'ctsp_dt' => (new HomeController()) -> ctsp_dt(),
    // 'deleteAllCart' => (new HomeController()) -> deleteAllCart(),
    
}








?>