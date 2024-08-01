<?php

class thongKEController {

    public $thongKeQuery;

    public function __construct() {
        $this -> thongKeQuery = new ThongKeQuery();
    }

    public function __destruct() {

    }

    public function show() {
        $dsthongKe = $this->thongKeQuery->getQuantityOfProInCate();
        // echo "<pre>";
        // print_r( $dsthongKe);
        include "view/View_thongke.php";
    }

}

?>