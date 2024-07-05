<?php

class CategoryQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from category";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCate = [];

            foreach ($data as $row) {
                $dsCate[] = convertToObjectCategory($row);
            }

            return $dsCate;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }




}


?>