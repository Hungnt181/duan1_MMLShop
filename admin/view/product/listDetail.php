<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../giaodien/style.css">
</head>

<body>
    <?php
    include "view/component/header.php"
    ?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="d-flex container">
        <!-- Sidebar trái -->
        <?php
        include "view/component/sidebar.php"
        ?>

        <!-- Main content -->
        <div class="shadow bg-light pb-5 mt-4 ms-4 mb-4 col-md-10">
            <h4 class="p-3">Chi tiết sản phẩm "IDP# <?php echo $_GET["pro_id"]; ?>"</h4>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <form action="" class="ms-4">
                    <div class="input-group input-group-sm">
                        <input class="form-control rounded-0 mb-2" type="search" id="search" name="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        <div class="input-group-sm">
                            <button type="button" class="btn btn-secondary rounded-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="me-4">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        <a href="index.php?act=create-product-detail&pro_id=<?php echo $_GET["pro_id"]; ?>" class="text-light">Thêm loại</a>
                    </button>
                    <!-- <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        <a href="" class="text-light">Xóa</a>
                    </button> -->
                </div>
            </div>


            <div class="pt-4 ms-4 me-4">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Stt</th>
                            <th scope="col">IDPD</th>
                            <th scope="col">Bảng màu</th>
                            <th scope="col">Kích cỡ</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dsProductDetail as $key => $pro_dt) {
                        ?>

                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row">
                                    <?= $i++?>
                                </td>
                                <td scope="row">
                                    <?= $pro_dt->product_dt_id?>
                                </td>
                                <td>
                                    <?= $pro_dt->pro_color?>    
                                </td>
                                <td>
                                    <?= $pro_dt->pro_size ?>
                                </td>
                                <td>
                                    <?= $pro_dt->pro_price?> 
                                </td>
                                <td>
                                    <?= $pro_dt->pro_quantity?> 
                                </td>
                                <td>
                                <?php
                                    if ($pro_dt->product_dt_status == 1) {
                                ?>
                                <span class="badge bg-success ">Đang bán</span>
                                <?php
                                    } else {
                                        ?>
                                <span class="badge bg-danger">Không bán</span>
                                <?php
                                    }
                                ?>
                            </td>
                                <td>
                                    <button class="btn btn-success ">
                                        <a href="index.php?act=update-product-detail&product_dt_id=<?= $pro_dt->product_dt_id?>&pro_id=<?php echo $_GET["pro_id"]; ?>" class="text-white">
                                            <i class="fa-solid fa-pen-to-square"></i> Sửa
                                        </a>
                                    </button>
                                    <!-- <button class="btn btn-danger">
                                        <a onclick="return confirm('Xác nhận xóa chi tiết sản phẩm #<?= $pro_dt->product_dt_id?>?')" href="index.php?act=delete-product-detail&product_dt_id=<?= $pro_dt->product_dt_id?>&pro_id=<?php echo $_GET["pro_id"]; ?>" class="text-white">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </a>
                                    </button> -->
                                    <!-- <button class="btn btn-danger">
                                        <a onclick="return confirm('Xác nhận thay đổi trạng thái chi tiết sản phẩm #<?= $pro_dt->product_dt_id?>?')" href="index.php?act=update-status-product-detail&product_dt_id=<?= $pro_dt->product_dt_id?>&pro_id=<?php echo $_GET["pro_id"]; ?>" class="text-white">
                                        <i class="fa-solid fa-arrows-rotate"></i> Đổi trạng thái 
                                        </a>
                                    </button> -->
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php
    include "view/component/footer.php"
    ?>
    <!-- END FOOTER -->
</body>

</html>