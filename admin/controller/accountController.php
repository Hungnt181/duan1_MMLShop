<?php

class AccountController {

    public $accountQuery;


    public function __construct() {
        $this -> accountQuery = new AccountQuery();
    }

    public function __destruct() {

    }

    // ---------------LIST OF ALL ACCOUNTS----------
    public function list() {
        $dsAccount = $this->accountQuery->all();
        include "view/account/list.php";
    }

}

?>