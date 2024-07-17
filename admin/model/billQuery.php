<?php
// ------------------------Tổng quan đơn hàng---------------------
class BillQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all() {
        try {
            $sql = "select * from bill";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsBill = [];

            foreach ($data as $row) {
                $dsBill[] = convertToObjectBill($row);
            }

            return $dsBill;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }

    public function readOneBill($bill_id) {
        try {
            $sql = "select * from bill join account on bill.acc_id = account.acc_id join  where bill.bill_id = $bill_id";
            $data = $this->pdo->query($sql)->fetch();
            $info = convertToObjectBill($data);
            return $info;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }
    }
}


// ---------------------Chi tiết đơn hàng--------------------
class BillDetailQuery {
    public $pdo;

    public function __construct() {
        $this->pdo = connectDB();
    }

    public function __destruct() {
        $this -> pdo = null;
    }

    public function all($bill_id) {
        try {
            $sql = "select * from bill_detail where bill_id = $bill_id";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsBillDetail = [];

            foreach ($data as $row) {
                $dsBillDetail[] = convertToObjectBillDetail($row);
            }

            return $dsBillDetail;
            
        } catch (Exception $e) {
            echo "Lỗi: ".$e ->getMessage();
            echo "<hr>";
        }

    }
}

?>