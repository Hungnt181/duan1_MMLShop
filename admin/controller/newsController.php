<?php

class NewsController {

    public $newsQuery;

    public function __construct() {
        $this -> newsQuery = new NewsQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsNews = $this->newsQuery->all();
        include "view/news/list.php";
    }

    public function create() {       
        if(isset($_POST["submitFormCreateNews"])) {
            $news = new News();
            $news -> news_title = trim($_POST["news_title"]);
            $news -> news_content = trim($_POST["news_content"]);
            $news -> news_img = "";

            if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                $img = $_FILES["image_upload"]["tmp_name"];
                $vi_tri = "../img/".$_FILES["image_upload"]["name"];
                if (move_uploaded_file($img, $vi_tri)) {
                    echo "Upload image thành công";
                    $news -> news_img = $_FILES["image_upload"]["name"];
                } else {
                    echo "Upload image thất bại";
                }
            }
            $result = $this -> newsQuery -> create($news);
            if ($result == "ok") {
                header("Location: ?act=list-news");
            } else {
                echo "Tạo mới sản phẩm thất bại. Mời nhập lại";
            }
        }
        // lấy danh sách danh mục để hiển thị view create news
        include "view/news/create.php";
    }

}

?>