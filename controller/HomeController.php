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
                $dsProDetail = $this->productDetailQuery->listProductDetail($pro_id);
                // var_dump($dsProDetail);

             
            }

            include "view/ctsp.php";
            
        }

        // public function ctsp_dt() {
        //     $dsCategory = $this->categoryQuery->all();
            
        //     if (isset($_GET['id'])) {
        //         $pro_id = $_GET['id'];
        //         $pro_one = $this->productQuery->find($pro_id);
        //         // var_dump($pro_one);
        //         // echo "<pre>";
        //         $dsProDetail = $this->productDetailQuery->listProductDetail($pro_id);
        //         // var_dump($dsProDetail);

        //         if(isset($_GET['id'])&&isset($_GET['pro_dt_id'])&&isset($_GET['color'])){
        //             $pro_id = $_GET['id'];
        //             $product_dt_dt_id=$_GET['pro_dt_id'];
        //             $pro_color=$_GET['color'];
        //         }
        //     }

        //     include "view/ctsp.php";
            
        // }

        

    }
?>