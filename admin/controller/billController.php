<?php

class BillController {
    public $billQuery;
    public $billDetailQuery;

    public function __construct() {
        $this -> billQuery = new BillQuery();
        $this -> billDetailQuery = new BillDetailQuery();
    }

    public function __destruct() {

    }

    // -------------Bill-------------

    public function list() {
        $dsBill = $this->billQuery->all();
        include "view/bill/list.php";
    }

    public function readOneBill() {
        if(isset($_GET["bill_id"]) && ($_GET["bill_id"]) > 0) {
            $info = $this->billQuery->readOneBill($_GET["bill_id"]);
        }
        include "view/bill/detail.php";
    }

    // -------------Bill Detail----------------
    
}

?>