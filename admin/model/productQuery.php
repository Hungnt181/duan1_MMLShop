<?php
// SQL Query for Product

class ProductQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from product";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsProduct = [];

            foreach ($data as $row) {
                $dsProduct[] = convertToObjectProduct($row);
            }

            return $dsProduct;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function createBase(Product $product) {
        try {
            $sql = "insert into product(pro_name,pro_image,pro_description,cate_id) values ('$product->pro_name','$product->pro_image','$product->pro_description','$product->cate_id')";
        // các giá trị của thuộc tính đặt trong dấu '' viêt liền không khoảng trắng: '$product->pro_name'
            $data = $this -> pdo -> exec($sql);
        // data = 1 nếu thành công
            if ($data == 1) {
                return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: ".$e -> getMessage();
        }
    }




}


?>