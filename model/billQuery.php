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


        public function add_bill(Bill $bill) {
            try {
                $sql = "INSERT INTO `bill`(`bill_id`, `fullname`, `phone`, `address`, `date_order`, `bill_total`, `acc_id`, `bill_status`, `payment_status`)  
                VALUES (NULL,'$bill->fullname','$bill->phone','$bill->address','$bill->date_order','$bill->bill_total','$bill->acc_id','$bill->bill_status','$bill->payment_status')";
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