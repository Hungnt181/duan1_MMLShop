<?php

class CategoryController {

    public $categoryQuery;

    public function __construct() {
        $this -> categoryQuery = new CategoryQuery();
    }

    public function __destruct() {

    }

    public function list() {
        $dsCate = $this->categoryQuery->all();
        include "view/category/list.php";
    }

   
}

?>