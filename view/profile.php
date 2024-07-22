<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/sign_in.css">
    <link rel="stylesheet" href="giaodien/userDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>
    <?php
        include "view/Component/header.php"
    ?>
    <!-- End header -->
    <main>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Trang chủ</a>
                    <i class="fa-solid fa-angle-right"></i>
                </li>
                <li>
                    <h5>Profile</h5>
                </li>
            </ul>
        </nav>
        <div class="profile">thông tin cá nhân</div>
        <form action="" method="POST" enctype="multipart/form-data" class="form-profile">
            <div class="avatar">
                <img src="img/account/<?= $info->acc_image ?>" alt="">
            </div>
            <div class="detail_info">
                <div class="hoten">Tên đăng kí: <?= $info->acc_name ?></div>
                <div class="email">Email: <?= $info->acc_email ?></div>
                <div class="password">Mật khẩu: <?= $info->acc_password ?></div>
                <div class="password">Số điện thoại: <?= $info->acc_phone ?></div>
            </div>
        </form>
        <div class="btn-edit">
            <a href="" class="btn-edit">
                <button>chỉnh sửa</button>
            </a>
        </div>

    </main>
    <hr>
</body>
<?php include "view/Component/footer.php" ?>

</html>