<?php

    class HomeController {
        public $categoryQuery;
        public $productQuery;
        public $productDetailQuery;

        public function __construct()
        {
            $this->productQuery = new ProductQuery();
            $this ->productDetailQuery = new ProductDetailQuery;
            $this->categoryQuery = new CategoryQuery();
        }

        public function __desstruct()
        {
            
        }

        public function home() {
            $dsCategory = $this->categoryQuery->all();

            $dsProduct = $this->productQuery->getTop16ProductLatest();
            
            // var_dump($dsProduct);
          
            // Hiển thị view trang chủ
            
            include "view/home.php";
        
        }

        public function ctsp() {
            $dsCategory = $this->categoryQuery->all();
            
            if (isset($_GET['id'])) {
                $pro_id = $_GET['id'];
                $pro_one = $this->productQuery->find($pro_id);
                // var_dump($pro_one);
                // echo "<pre>";
                $cate_id = $pro_one->cate_id;
                $dsProDetail = $this->productDetailQuery->listProductDetail($pro_id);
                $dsProduct_same = $this->productQuery->getProductSameCate_id($cate_id);
                // var_dump($dsProDetail);

             
            }

            include "view/ctsp.php";
            
        }

    public function cart() {

            if (isset($_POST['buy'])) {
                echo "<Pre>";
                print_r($_POST);
            }


        include "view/cart.php";
    }

        

    }
?>