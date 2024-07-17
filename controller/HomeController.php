<?php

    class HomeController {
        public $categoryQuery;
        public $productQuery;
        public $productDetailQuery;
        public $accountQuery;
        public $billQuery;

        public function __construct()
        {
            $this->productQuery = new ProductQuery();
            $this ->productDetailQuery = new ProductDetailQuery;
            $this->categoryQuery = new CategoryQuery();
            $this -> accountQuery = new AccountQuery();
            $this -> billQuery= new BillQuery();
        }

        public function __desstruct()
        {
            
        }

        public function home() {
            $allSlPro = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                }
            }
            $dsCategory = $this->categoryQuery->all();

            $dsProduct = $this->productQuery->getTop16ProductLatest();
            
            // var_dump($dsProduct);
          
            // Hiển thị view trang chủ
            
            include "view/home.php";
        
        }

        public function ctsp() {
            $dsCategory = $this->categoryQuery->all();
            $allSlPro = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                }
            }
            
            if (isset($_GET['id'])) {
                $pro_id = $_GET['id'];
                $pro_one = $this->productQuery->find($pro_id);
                // var_dump($pro_one);
                // echo "<pre>";
                $cate_id = $pro_one->cate_id;
                $dsProDetail = $this->productDetailQuery->listProductDetail($pro_id);
                $dsProduct_same = $this->productQuery->getProductSameCate_id($cate_id);
                // var_dump($dsProDetail);

             
            }

            include "view/ctsp.php";
            
        }

    public function cart() {
        $dsCategory = $this->categoryQuery->all();
            if (isset($_POST['addToCart'])) {
                // echo "<Pre>";
                // print_r($_POST);
                $pro_size = $_POST['pro_size'];
                $pro_color = $_POST['pro_color'];
                $pro_id = $_POST['pro_id'];
                $soluong = $_POST['soluong']; 
                if (!$pro_size) {
                    ?>
                        <script>
                            alert("Vui lòng chọn kích cỡ");
                            window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                        </script>
                    <?php
                } 
                if (!$pro_color) {
                    ?>
                        <script>
                            alert("Vui lòng chọn màu sắc");
                            window.location.href = "?act=ctsp&id=<?=$pro_id?>";
                        </script>
                    <?php
                } 
                $pro_detail_one = $this->productDetailQuery->infoOneProductDetail_color_size_proID($pro_id,$pro_size,$pro_color);
                if ($pro_detail_one->pro_quantity <= $soluong) {
                    ?>
                        <script>
                            alert("Quá số lượng hàng còn trong kho");
                            window.location.href = "?act=ctsp&id=<?=$pro_detail_one->pro_id?>";
                        </script>
                    <?php
                } 
                $total = $pro_detail_one->pro_price * $soluong;
                
                $array_pro = [
                    'product_dt_id' =>$pro_detail_one->product_dt_id,
                    'pro_img'=> $pro_detail_one->pro_image,
                    'pro_color' =>$pro_detail_one->pro_color,
                    'pro_size' =>$pro_detail_one->pro_size,
                    'pro_name'=> $pro_detail_one->pro_name,
                    'pro_price'=> $pro_detail_one->pro_price,
                    'pro_quantity'=> $pro_detail_one->pro_quantity,
                    'soluong' => $soluong,
                    'total'=> $total,
                ];

                if (isset($_SESSION["myCart"])) {
                    $proInCart = "" ;
                    foreach ($_SESSION["myCart"] as $key => $proCart) {
                        if ($array_pro['product_dt_id'] == $proCart['product_dt_id']) {
                            $proCart['soluong'] += $array_pro['soluong'];
                            $soluongIncart = $proCart['soluong'];
                            $totalProIncart = $soluongIncart * $proCart['pro_price'];

                            $array_pro = [
                                'product_dt_id' =>$pro_detail_one->product_dt_id,
                                'pro_img'=> $pro_detail_one->pro_image,
                                'pro_color' =>$pro_detail_one->pro_color,
                                'pro_size' =>$pro_detail_one->pro_size,
                                'pro_name'=> $pro_detail_one->pro_name,
                                'pro_price'=> $pro_detail_one->pro_price,
                                'pro_quantity'=> $pro_detail_one->pro_quantity,
                                'soluong' => $soluongIncart,
                                'total'=> $totalProIncart,
                            ];
                            $proInCart = 1;
                            $_SESSION["myCart"][$key] = $array_pro;
                        }
                        // break;
                    }
                    if ($proInCart !== 1) {
                        array_push($_SESSION["myCart"],$array_pro);
                    } else {
                        array_push($_SESSION["myCart"],$array_pro);
                        // echo "<pre>";
                        // print_r($_SESSION["myCart"]);
                        foreach ($_SESSION["myCart"] as $key => $proCart) {
                            if ($array_pro['product_dt_id'] == $proCart['product_dt_id']) {
                                unset($_SESSION["myCart"][$key]);
                                break;
                            }
                        }
                    }
                } else{
                    array_push($_SESSION["myCart"],$array_pro);
                }
                // echo "<pre>";
                // print_r($_SESSION['myCart']);
                $allSlPro = 0;
                foreach ($_SESSION["myCart"] as $key => $proCart) {
                    if ($proCart['product_dt_id']) {
                        $allSlPro++;
                    }
                }
                // print_r($allSlPro);
            }
            $allSlPro = 0;
            $tongTien = 0;
            foreach ($_SESSION["myCart"] as $key => $proCart) {
                if ($proCart['product_dt_id']) {
                    $allSlPro++;
                    $tongTien += $proCart['total'];
                }
            }
        include "view/cart.php";
    }

    public function order() {
        $allSlPro = 0;
        $array = [];
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();

        if (isset($_POST['submitInforCart'])) {
            // echo "<Pre>";
            // print_r($_POST);
            $index = 0;
            $lastIndex = $_POST['lastIndex'];
            $tongTien = $_POST['tongTien'];
            foreach($_POST as $info) {
               if ($lastIndex >= $index) {
                $pro_image = $_POST['imgInCart'.$index];
                $pro_info = $_POST['pro_inf'.$index];
                $totalOnePro = $_POST['totalOnePro'.$index];
                $soluong = $_POST['soluongIncart'.$index]; 
                $arry_Order = [
                    'pro_image' => $pro_image,
                    'pro_info' => $pro_info,
                    'totalOnePro' => $totalOnePro,
                    'soluong' => $soluong,
                    'tongTien' => $tongTien,
                ];
                array_push($array,$arry_Order);
                $index++;
               }
              
            }
            // echo "<Pre>";
            // print_r($array);
        }
        $check ="";
        if (isset($_SESSION['acc_email'])) {
            $email = $_SESSION['acc_email'];
            // var_dump( $email);
            $acc_id = $_SESSION['acc_id'];
            $check = 1;
        } else {
            $check = 0;
        }

        include "view/order.php";
    }

    public function end_order() {
        $allSlPro = 0;
        $array = [];
        foreach ($_SESSION["myCart"] as $key => $proCart) {
            if ($proCart['product_dt_id']) {
                $allSlPro++;
            }
        }
        $dsCategory = $this->categoryQuery->all();
        if (isset($_POST['btn_DatHang'])) {
            // echo "<Pre>";
            // print_r($_POST);
            if (!isset($_SESSION['acc_name'])) {
                ?>
                    <script>
                        alert("Vui lòng đăng nhập tài khoản để đặt hàng");
                        window.location.href = "?act=login";
                    </script>
                <?php
            } else {
                $bill = new Bill();
                $bill->fullname = trim($_POST['fullname']);
                $bill->phone = trim($_POST['phone']);
                $bill->address = trim($_POST['address']);
                $bill->date_order = trim($_POST['date_order']);
                $bill->bill_total = trim($_POST['bill_total']);
                $bill->acc_id = trim($_POST['acc_id']);
                $bill-> bill_status= 1;
                $bill->payment_status = $_POST['payment_method'];
                $result = $this->billQuery->add_bill($bill);
                if ($result == "ok") {
                    // header("Location: ?act=login");
                    // echo "ok";
                } else {
                    echo "Đăng kí thất bại";
                }
            }
        }
        include "view/end_order.php";
    }

        

    }
?>