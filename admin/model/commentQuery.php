<?php

class CommentQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from comment join product on comment.pro_id = product.pro_id join account on comment.account_id = account.acc_id";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCmt = [];

            foreach ($data as $row) {
                $dsCmt[] = convertToObjectComment($row);
            }

            return $dsCmt;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function delete($com_id) {
        try {
            $sql = "delete from comment where com_id = $com_id ";
            $data = $this -> pdo -> prepare($sql);
            return $data->execute();

        } catch (\Throwable $th) {
            
        }
    }

    public function readOneComment($com_id) {
        try {
            $sql = "select * from comment join product on comment.pro_id = product.pro_id join account on comment.account_id = account.acc_id where comment.com_id = $com_id";
            $data = $this->pdo->query($sql)->fetch();
            $info = convertToObjectComment($data);
            return $info;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }
}
?>