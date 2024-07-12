<?php
    class LoginController {

        public $loginQuery;
        public $accountQuery;
        public $categoryQuery;
        

        public function __construct() {
            $this->loginQuery = new LoginQuery();
            $this -> accountQuery = new AccountQuery();
            $this ->categoryQuery = new CategoryQuery();
        }
        public function __destruct() {}


        public function login() {
            $dsCategory = $this->categoryQuery->all();
             $tb = "";

            // Kiểm tra nếu người dùng click login

            if (isset($_POST['loginSubmit'])) {
                // var_dump($_POST);

                //lấy giá trị email và passwprd từ input
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);


                $result = $this ->loginQuery->checkLogin($email, $password);
                if ($result === 0) {
                   $tb= "Sai mật khẩu hoặc tài khoản";

                } else {
                    // echo "Đăng nhập thành công";
                    // $tb = "";
                    // Lưu thông tin vào session
                    $_SESSION['acc_name'] = $result->acc_name;
                    $_SESSION['acc_id'] = $result->acc_id;
                    $_SESSION['acc_role'] = $result->acc_role;
                    $_SESSION['acc_status'] = $result->acc_status;
                    // echo $_SESSION['acc_status'];

                    if ($_SESSION['acc_status'] == 1 ) {
                        header('Location: ?act=').'';
                    }else {
                        session_unset();
                        $tb= "Tài khoản hiện tại đã bị ngừng hoạt động";
                    }
                    // echo   $_SESSION['role'];
                    // header('Location: ?act=').'';
                }

            }

            include "view/login.php";
        }

        public function logout() {
            session_destroy();
            header('Location: index.php').'';
        }

        public function signup() {
            session_unset();
            $tb = "";
            $tb_pass ="";
            $dsCategory = $this->categoryQuery->all();
            $dsAcc = $this->accountQuery->all();
            // var_dump($dsAcc);
            $listEmail = [];
            foreach ($dsAcc as $acc) {
                $listEmail[] = $acc->acc_email;
            }
            // var_dump($listEmail);

            if (isset($_POST['submitFormSignup'])) {
                // echo "<pre>";
                // print_r($_POST);
                $acc_pass = $_POST['acc_password'];
                $acc_pass2 = $_POST['password'];
                if ($acc_pass !== $acc_pass2) {
                    $tb_pass = "Mật khẩu không trùng khớp";
                } else {
                    $email = trim($_POST['acc_email']);
                    if (in_array($email,$listEmail)) {
                        $tb= "Email đã được sử dụng";
                    } else {
                        $account = new Account();
                        $account->acc_name = trim($_POST['acc_name']);
                        $account->acc_password = trim($_POST['acc_password']);
                        $account->acc_email = trim($_POST['acc_email']);
                        $account->acc_phone = trim($_POST['acc_phone']);
                        $account->acc_status = 1;
                        $account->acc_role = 0;
                        $account->acc_image="";
                        if (isset($_FILES["image_upload"]) && ($_FILES["image_upload"]["tmp_name"]) !== "") {
                            $img = $_FILES["image_upload"]["tmp_name"];
                            $vi_tri = "img/".$_FILES["image_upload"]["name"];
                            if (move_uploaded_file($img, $vi_tri)) {
                                echo "Upload image thành công";
                                $account->acc_image = $_FILES["image_upload"]["name"];
                            } else {
                                echo "Upload image thất bại";
                            }
                        }

                        $result = $this->loginQuery->signup($account);
                        if ($result == "ok") {
                            header("Location: ?act=login");
                        } else {
                            echo "Đăng kí thất bại";
                        }
                    }
                }

             
            }
            include "view/signup.php";
        }


    }


?>
