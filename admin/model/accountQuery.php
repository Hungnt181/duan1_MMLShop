<?php

class AccountQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    // -----sql for showing all of accounts
    public function all() {
        try {
            $sql = "select * from account";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsAccount = [];

            foreach ($data as $row) {
                $dsAccount[] = convertToObjectAccount($row);
                
            }

            return $dsAccount;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }

}

?>