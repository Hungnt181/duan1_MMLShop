<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="shortcut icon" href="img/Group 2.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/Clientstyle.css">
    <link rel="stylesheet" href="giaodien/home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>

    <style>
      header {
        width: 100%;
      }
      a {
        text-decoration: none;
      }

      main {
        margin-top: 100px;
      }
    </style>
</head>

<body>
    <?php
    include "view/component/header.php";
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->

    <div class="banner w95">
            <div class="banner_slideshow">
                <img src="img/banner.jpg" alt="">
            </div>
            <div class="banner_content">
                <h3><span></span>Xu hướng 2024</h3>
                <h1>thiết kế nội thất</h1>
                <p>Xu hướng thiết kế nội thất Bắc Âu được giới trẻ ưu ái sử dụng
                    trong những năm gần nhờ vào trào lưu sống xanh, bền vững và
                    yêu môi trường với chi phí phù hợp
                </p>
                <h3><a href="">mua ngay</a></h3>
            </div>
        </div>
        <!-- Main content -->
      <main class="container">
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col" class="text-center">Đơn Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Số Tiền</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                if (isset($_SESSION['myCart'])) {
                    foreach ($_SESSION['myCart'] as $pro) : ?>
                        
                            <tr>
                                <th scope="row" style="width: 50%;">
                                    <input type="checkbox" class="me-2">
                                    <img src="giaodien/img/<?=$pro['pro_img']?>" width="10%" alt="">
                                    <span><?=$pro['pro_name']?></span>
                                </th>
                                <td>
                                    <div class="d-flex text-center">
                                        <span class="text-black fw-bold pe-2"><?=$pro['pro_price']?></span>
                                        <!-- <span class="text-black fw-bold ps-2"></span> -->
                                    </div>
                                </td>
                                <td>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination d-flex">
                                            <li class="page-item">
                                                <a class="page-link text-success" aria-label="Next">
                                                    <span> - </span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-success" href="#"><?=$pro['soluong']?></a></li>
                                            <li class="page-item">
                                                <a class="page-link text-success" aria-label="Previous">
                                                    <i class="fa-solid fa-plus fa-xs"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </td>
                                <td style="font-weight: 600;"><?=$pro['total']?>.000</td>
                                <td>
                                    <a href="?act=deleteProInCart"><button class="btn btn-danger" style="margin-left: 10px;" name="deleteProIncart">Xóa</button></a>
                                    <button class="btn bg-success" style="color: #fff;">Mua</button>
                                   
                                </td>
                            </tr>
                            <?php endforeach; } ?>
            </tbody>
        </table>
      </main>
       
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php
    include "view/component/footer.php";
    ?>
    <!-- END FOOTER -->
</body>

</html>