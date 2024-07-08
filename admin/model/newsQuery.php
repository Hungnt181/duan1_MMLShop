<?php

class NewsQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from news";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsNews = [];

            foreach ($data as $row) {
                $dsNews[] = convertToObjectNews($row);
            }

            return $dsNews;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function create(News $news) {
        try {
            $sql = "INSERT INTO `news`(`news_id`, `news_title`, `news_img`,`news_content` ) VALUES (NULL,'$news->news_title','$news->news_img','$news->news_content')";
            $data = $this -> pdo -> exec($sql);
           
            if ($data==1) {
               return "ok";
            } else {
                return $data;
            }
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }


    // public function show_one_cate($cate_id) {
    //     try {
    //         $sql = "select * from news where cate_id = $cate_id";
    //         $data = $this->pdo->query($sql)->fetch();
           
    //         $danhSach = convertToObjectnews($data);
    //         return $data;
            
    //     } catch (Exception $e) {
    //         echo "Lỗi: ".$e ->getMessage();
    //         echo "<hr>";
    //     }

    // }

    // public function updateCate(news $news) {
    //     try {
    //         $sql = "UPDATE `news` SET `cate_name`='$news->cate_name',`cate_status`='$news->cate_status' WHERE `cate_id`='$news->cate_id' ";
    //         $data = $this->pdo->exec($sql);
    //         if ($data == 1 || $data == 0) {
    //             return "ok";
    //         } else {
    //             return $data;
    //         }

    //     } catch (Exception $e) {
    //         echo "Lỗi: ".$e ->getMessage();
    //         echo "<hr>";
    //     }
    // }
        
}


?>