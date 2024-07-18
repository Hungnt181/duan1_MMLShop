 <?php
    class BillQuery {
        public $pdo;
        public function __construct()
        {
           $this ->pdo=connectDB(); 
        }

        public function __destruct()
        {
            $this->pdo = 'null';
        }

       
            // private $bill_id;
            // // Các phương thức khác và constructor...
        
            // public function getBillId() {
            //     return $this->bill_id;
            // }
        


        public function add_bill(Bill $bill) {
            try {
                $sql = "INSERT INTO `bill`(`bill_id`, `fullname`, `phone`, `address`, `date_order`, `bill_total`, `acc_id`, `bill_status`, `payment_status`)  
                VALUES (NULL,'$bill->fullname','$bill->phone','$bill->address','$bill->date_order','$bill->bill_total','$bill->acc_id','$bill->bill_status','$bill->payment_status')";
                $data = $this->pdo->exec($sql);
                if ($data == 1) {
                    // return "ok";
                    $billId = $this->pdo->lastInsertId();
                    return $billId;
                } else {
                    return $data;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    class BillDetailQuery {
        public $pdo;
        public function __construct()
        {
           $this ->pdo=connectDB(); 
        }

        public function __destruct()
        {
            $this->pdo = 'null';
        }


        public function add_billDetail(BillDetail $billDetail) {
            try {
                $sql = "INSERT INTO `bill_detail`(`bill_dt_id`, `pro_name`, `price`, `quantity`, `total`, `bill_id`, `pro_dt_id`)
                 VALUES (NULL,'$billDetail->pro_name','$billDetail->price','$billDetail->quantity','$billDetail->total','$billDetail->bill_id','$billDetail->pro_dt_id')";
                $data = $this->pdo->exec($sql);
                if ($data == 1) {
                    return "ok";
                } else {
                    return $data;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
?>