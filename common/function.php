<?php
// Hàm kết nối CSDL
    function connectDB() {
        $host = DB_HOST;
        $port  = DB_PORT;
        $dbname = DB_NAME;

        try {
            $conn = new PDO ("mysql:host=$host;port=$port;dbname=$dbname",DB_USER,DB_PASS);
            return $conn;
        } catch (\Throwable $th) {
            echo "Lỗi";
        }
    }


    function convertToObjectCategory($row) {
        $category = new Category();
        $category -> cate_id = $row['cate_id'];
        $category -> cate_name = $row['cate_name'];
        $category -> cate_status = $row['cate_status'];
        return $category;
    }

    function convertToObjectProduct($row) {
        $product = new Product();
        $product -> pro_id = $row['pro_id'];
        $product -> pro_name = $row['pro_name'];
        $product -> pro_image = $row['pro_image'];
        $product -> pro_description = $row['pro_description'];
        $product -> cate_id = $row['cate_id'];
        return $product;
    }

    function convertToObjectProductDetail($row) {
        $proDetail = new ProductDetail();
        $proDetail -> product_dt_id = $row['product_dt_id'];
        $proDetail -> pro_color = $row['pro_color'];
        $proDetail -> pro_size = $row['pro_size'];
        $proDetail -> pro_price = $row['pro_price'];
        $proDetail -> pro_quantity = $row['pro_quantity'];
        $proDetail -> pro_id = $row['pro_id'];
        $proDetail -> pro_name = $row['pro_name'];
        return $proDetail;
    }
?>