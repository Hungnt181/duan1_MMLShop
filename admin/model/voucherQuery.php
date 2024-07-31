
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

    public function getVoucher500K_active() {
        try {
            $sql = "select * from voucher where value = 5 and voucher_status = 1 ";
            $data = $this->pdo->query($sql)->fetchAll();
            $voucher5 = [];
            foreach ($data as $row) {
                $voucher5[] = convertToObjectVoucher($row);
            }
            return $voucher5;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }  

    public function all_active() {
        try {
            $sql = "select * from voucher where voucher_status = 1 and voucher_quantity > 0";
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
}
?>