
<?php

class ThongKeQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function getQuantityOfProInCate() {
        try {
            $sql = "SELECT category.cate_id, category.cate_name, SUM(product_detail.pro_quantity) AS total_quantity 
            FROM category 
            LEFT JOIN product ON category.cate_id = product.cate_id 
            LEFT JOIN product_detail ON product.pro_id = product_detail.pro_id 
            WHERE category.cate_status = 1 and product.pro_status=1 
            GROUP BY category.cate_id, category.cate_name;";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsThongKe = [];

            foreach ($data as $row) {
                $dsThongKe[] = convertToObjectThongKe($row);
            }

            return $dsThongKe;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  
}
?>