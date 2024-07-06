<?php

// function for product

class ProductController {

    public $productQuery;

    public function __construct() {
        $this -> productQuery = new ProductQuery();
        $this -> categoryQuery = new CategoryQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsProduct = $this->productQuery->all();
        include "view/product/list.php";
    }

    public function create() {
        
        if(isset($_POST["submitFormCreatePro"])) {
            $product = new Product();
            $product -> pro_name = trim($_POST["pro_name"]);
            $product -> pro_description = trim($_POST["pro_description"]);
            $product -> cate_id = trim($_POST["cate_id"]);
            $product -> pro_image = "";


            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/product/".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $product -> pro_image = $_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
            }

            $result = $this -> productQuery -> createBase($product);
            if ($result == "ok") {
                header("Location: ?act=list-product");
            } else {
                echo "Tạo mới sản phẩm thất bại. Mời nhập lại";
            }
        }

        // lấy danh sách danh mục để hiển thị view create product
        $dsCate = $this -> categoryQuery -> all();


        include "view/product/create.php";

    }
}

?>