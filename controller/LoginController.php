<?php
    class LoginController {

        public $loginQuery;
        // public $accountQuery;
        public $categoryQuery;
        

        public function __construct() {
            $this->loginQuery = new LoginQuery();
            // $this -> accountQuery = new AccountQuery();
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
            $dsCategory = $this->categoryQuery->all();
            include "view/signup.php";
        }


    }


?>
