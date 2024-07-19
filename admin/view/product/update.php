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
        <div class="shadow bg-light mt-4 ms-4 col-md-8">
            <form action="" class="pb-5 mt-4 ms-4 me-4" method="POSt" enctype="multipart/form-data">
                <div>
                    <h4 class="p-3">Cập nhật sản phẩm</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="">
                        <label for="inputEmail4" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" class="form-control rounded-0" id="inputEmail4" placeholder=""
                            name="image_upload">
                        <img src="../img/product/<?= $info->pro_image ?>" alt="" style="width:200px; margin: 20px 0;"
                            name="existing_image">
                    </div>
                    <div class="">
                        <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control rounded-0" id="inputEmail4"
                            placeholder="Nhập tên sản phẩm" name="pro_name" value="<?= $info->pro_name ?>">
                    </div>
                    <div class="">
                        <label for="inputPassword5" class="form-label">Mô tả</label>
                        <textarea id="" cols="30" rows="3" class="form-control" placeholder="Mô tả"
                            name="pro_description">
                            <?= $info->pro_description ?>
                        </textarea>
                    </div>

                    <div class="mt-3">
                        <span class="form-label">Danh mục sản phẩm:</span>
                        <select class="form-control" name="cate_id">
                            <?php foreach ($dsCate as $category) : ?>
                            <?php
                                    if ($category->cate_status==1) {
                                        ?>
                            <option value="<?= $category->cate_id ?>"
                                <?= $category->cate_id == $info->cate_id ? "selected" : ''  ?>>
                                <?= $category->cate_name ?></option>
                            <?php
                                    }
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <span class="form-label">Trạng thái sản phẩm</span>
                        <div class="row ps-3 pt-2">
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="1" name="pro_status"
                                    <?= $info->pro_status == "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bán sản phẩm
                                </label>
                            </div>
                            <div class="form-check col-5">
                                <input class="form-check-input" type="radio" value="0" name="pro_status"
                                    <?= $info->pro_status != "1" ? "checked" : "" ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Ẩn sản phẩm
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="submitFormUpdatePro">Cập nhật</button>
                    </div>
                </div>
            </form>
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