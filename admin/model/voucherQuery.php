
<?php

class VoucherQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from voucher";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsVoucher = [];

            foreach ($data as $row) {
                $dsVoucher[] = convertToObjectVoucher($row);
            }

            return $dsVoucher;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  

    public function getVoucher500K() {
        try {
            $sql = "select * from voucher where value = 5 ";
            $data = $this->pdo->query($sql)->fetch();
            $voucher5 = convertToObjectVoucher($data);
            return $voucher5;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  
}
?>