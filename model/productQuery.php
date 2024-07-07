<?php
    class ProductQuery {
        public $pdo;

        public function __construct()
        {
            $this ->pdo = connectDB();
        }

        public function __destruct()
        {
            $this ->pdo = null;
        }

        public function getTop16ProductLatest() {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id order by pro_id asc ";
                $data = $this ->pdo->query($sql)->fetchAll();
                $dsProduct = [];
                foreach ($data as $row) {
                    $dsProduct[] = convertToObjectProduct($row);
                 }
                 return $dsProduct;

            } catch (Exception $e) {
                echo "Lỗi" .$e->getMessage();
                echo "<hr>";
            }
        }

        public function find($pro_id) {
            try {
                $sql = "select * from product inner join category on product.cate_id = category.cate_id where pro_id = $pro_id";
                $data = $this->pdo->query($sql)->fetch();
                // Chuyển đổi dữ liêụ --> object Produc
                
                    $product = convertToObjectProduct($data);
                    return $product;
        
            } catch (Exception $e) {
                echo "Lỗi: ".$e->getMessage();
                echo "<hr>";
            }
            
        }
    }

    class ProductDetailQuery {
        public $pdo;
    
        public function __construct() {
            $this->pdo = connectDB();
        }
    
        public function __destruct() {
            $this -> pdo = null;
        }
    
        // ----------sql for showing all of products detail
        public function listProductDetail($pro_id) {
            try {
                $sql = "select * from product_detail join product on product_detail.pro_id = product.pro_id where product_detail.pro_id = $pro_id";
                $data = $this->pdo->query($sql)->fetchAll();
                $dsProductDetail = [];
    
                foreach ($data as $row) {
                    $dsProductDetail[] = convertToObjectProductDetail($row);
                }
    
                return $dsProductDetail;
                
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }

            // ------sql for showing a product detail
        public function infoOneProductDetail($product_dt_id) {
            try {
                $sql = "select * from product_detail join product on product_detail.pro_id = product.pro_id where product_dt_id = $product_dt_id";
                $data = $this->pdo->query($sql)->fetch();
                $info = convertToObjectProductDetail($data);
                return $info;
                
            } catch (Exception $e) {
                echo "Lỗi: ".$e ->getMessage();
                echo "<hr>";
            }
        }
    
    }
?>