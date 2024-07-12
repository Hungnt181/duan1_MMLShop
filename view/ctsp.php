<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="shortcut icon" href="../img/logo_darkblue_notfull.svg" type="image/x-icon">
    <link rel="stylesheet" href="giaodien/home.css">
    <link rel="stylesheet" href="giaodien/chiTietSP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/6dab569175.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
</head>
</head>

<body>
    <header>
        <div class="logo">
            <a href=""><img src="img/logo_darkblue_notfull.svg" alt=""></a>
        </div>
        <div class="search">
            <form action="">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" placeholder="Từ khóa tìm kiếm">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="?act=">trang chủ</a></li>
                <li><a href="">giới thiệu</a></li>
                <li class="box_sub_menu">
                    <a href="">sản phẩm</a>
                    <ul class="sub_menu">
                        <?php foreach ($dsCategory as $cate) : ?>

                            <?php
                            if ($cate->cate_status == 1) {
                            ?>
                                <a href="">
                                    <li><?= $cate->cate_name ?></li>
                                </a>
                            <?php
                            }
                            ?>

                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="">thư viện</a></li>
                <li><a href="">tin tức</a></li>
                <li><a href="">liên hệ</a></li>
            </ul>
        </div>
        <div class="tool">
            <ul>
                <li>
                    <a href="" class="icon_login" id="icon_login">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="number">
                        <i class="fa-regular fa-heart"></i>
                        <span class="item_number">0</span>
                    </a>
                </li>
                <li>
                    <a href="" class="number">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="item_number">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- End header -->

    <!-- Begin main  -->

    <div class="row1">
        <ul>
            <li><a href="">Trang chủ</a></li>
            <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="">

                    <?php
                    if ($pro_one->cate_status == 1) {
                         ?>
                            <a href="">
                            <li><?= $pro_one->cate_name?></li>
                            </a>
                        <?php
                    } else { ?>
                        <a href="">
                            <li>Không danh mục </li>
                        </a>  <?php
                    }
                    ?>
            </a></li>
        <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
        <li><a href=""><?= $pro_one->pro_name ?></a></li>
        </ul>
    </div>
    <main>


        <div class="row2">
            <div class="row2_img">
                <img src="img/product/<?= $pro_one->pro_image?>" alt="">
            </div>

            <div class="pro_inf">
                <h4><?= $pro_one->pro_name?></h4>
                <h5>Liên hệ</h5>
                <div class="inf">
                    <div class="id">
                        <label for="">Mã sản phẩm:</label>
                        <span><?= $pro_one->pro_id?></span>
                    </div>
                    <div class="cate">
                        <label for="">Danh mục:</label>
                        <span><?php
                    if ($pro_one->cate_status == 1) {
                         ?>
                            <?= $pro_one->cate_name ?>
                        <?php
                    } else { ?>
                            Không danh mục 
                      <?php
                    }
                    ?></span>
                    </div>
                    <div class="mota">
                        <?= $pro_one->pro_description?>
                    </div>
                </div>

                <div class="form">
                    <form action="?act=cart" method="post">
                        <div class="color">
                            <label for="">
                                <h3>Màu sắc</h3>
                            </label>
                            <div class="box_color">
                                <?php
                                    $arayColor = [];
                                     foreach ($dsProDetail as $pro_dt_list) {
                                        
                                        if (!in_array($pro_dt_list-> pro_color,$arayColor)) {
                                            $arayColor[] =   $pro_dt_list-> pro_color;
                                        }
                                     }
                                    //  var_dump($arayColor);
                                ?>
                                <?php foreach ($arayColor as $color) : ?>
                                    <input type="radio" value="<?= $color?>" name="pro_color" id="<?=$color?>" hidden class="color">
                                    <label id ="label" for="<?=$color?>"  style="width: 100px; height: 40px; border-radius: 20px; border: 1px solid black; text-align: center;
                                     line-height: 40px; cursor: pointer; margin-right: 10px; background-color: #fff;"><?=$color?></label>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>

                        <div class="size">
                            <label for="">
                                <h3>Kích cỡ</h3>
                            </label>

                            <div class="box_size">
                                <?php
                                    $araySize = [];
                                     foreach ($dsProDetail as $pro_dt_list) {
                                        
                                        if (!in_array($pro_dt_list->pro_size,$araySize)) {
                                            $araySize[] =   $pro_dt_list-> pro_size;
                                        }
                                     }
                                    //  var_dump($araySize);
                                ?>
                                <?php foreach ($araySize as $size) : ?>    
                                    <input type="radio" value="<?= $size?>" name="pro_size" id="<?=$size?>" hidden class="size">
                                    <label id="label1" for="<?=$size?>"  style="width: 100px; height: 40px; border-radius: 20px; border: 1px solid black; text-align: center;
                                     line-height: 40px; cursor: pointer; margin-right: 10px; background-color: #fff;"><?=$size?></label>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                        <div class="contact">
                            <div class="phone">
                                <i class="fa-solid fa-phone"></i>
                                1900 6868
                            </div>

                            <div class="buy">
                                <a href="">
                                    <button type="submit" name='buy'>MUA HÀNG</button>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>

 <!-- ?act=cart&pro_id=<?= $pro_one->pro_id?>&pro_color=<?=$color?>&pro_size=<?=$size?> -->

                <div class="icon">
                    <ul>
                        <li><a href="">Chia sẻ:</a></li>
                        <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="row2_bh">
                <div class="row2_bh_one">
                    <h3>CHÚNG TÔI LUÔN Ở ĐÂY ĐỂ HỖ TRỢ BẠN</h3>
                    <p>Hotline tư vấn</p>
                    <h4>1900 6868</h4>
                </div>
                <div class="row2_bh_tow">
                    <div class="row2_bh_tow_icon">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="row2_bh_tow_text">
                        <h5>Giao hàng ngay</h5>
                        <p>Giao hàng tận nhà</p>
                    </div>
                </div>
                <div class="row2_bh_tow">
                    <div class="row2_bh_tow_icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <div class="row2_bh_tow_text">
                        <h5>Bảo hành chính hãng</h5>
                        <p>Đối mới 100% (Nếu lỗi do NSX)</p>
                    </div>
                </div>
                <div class="row2_bh_tow">
                    <div class="row2_bh_tow_icon">
                        <i class="fa-regular fa-circle-check"></i>
                    </div>
                    <div class="row2_bh_tow_text">
                        <h5>Dịch vụ tốt - nhanh</h5>
                        <p>Sự hài lòng của quý khách </p>
                    </div>
                </div>


            </div>
        </div>

        <div class="row3">
            <h3>Thông tin sản phẩm</h3>
            <div class="pro_description">
                <?= $pro_one->pro_description?>
            </div>
        </div>

        <div class="row4">
            <h3>Bình luận</h3>
            <div class="pro_description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dignissimos sint possimus nemo velit quia earum, nesciunt,
                explicabo culpa sit adipisci esse libero reiciendis omnis pariatur aspernatur eius aliquam cupiditate
                temporibus.
            </div>

            <button type="submit">Gửi bình luận</button>
        </div>

        <div class="hot_products w95">
            <div class="title">Sản phẩm liên quan</div>

            <div class="list_pro">
                <?php
                    // var_dump($dsProduct_same);
                    foreach ($dsProduct_same as $pro_same) : ?>
                        <div class="pro_item">
                        <div class="quick_act">
                            <form action="">
                                <button><i class="fa-regular fa-heart"></i></button>
                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                <button><i class="fa-regular fa-eye"></i></button>
                            </form>
                        </div>
                        <div class="img_pro">
                            <a href="?act=ctsp&id=<?= $pro_same->pro_id?>"><img src="img/product/<?=$pro_same->pro_image?>" alt=""></a>
                        </div>
                        <div class="content_pro">
                            <div class="name_pro">
                                <a href="?act=ctsp&id=<?= $pro_same->pro_id?>"><?=$pro_same->pro_name?></a>
                            </div>
                            <div class="price_pro">
                                <p>Liên hệ <span></span></p>
                            </div>
                        </div>
                    </div> 
                    <?php endforeach;?>
             
                <!-- End pro_item -->
            </div>
        </div>



    </main>

    <!-- footer -->

    <?php
        include "view/Component/footer.php"
    ?>

    <script>
         document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.color + label');

        labels.forEach(function(label) {
            label.addEventListener('click', function() {
                const selectedColor = this.getAttribute('for');
                labels.forEach(function(label) {
                    if (label.getAttribute('for') === selectedColor) {
                        label.style.border = '3px solid #141F46';
                    } else {
                        label.style.border = '1px solid #141F46';
                    }
                });
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.size + label');

        labels.forEach(function(label) {
            label.addEventListener('click', function() {
                const selectedSize = this.getAttribute('for');
                labels.forEach(function(label) {
                    if (label.getAttribute('for') === selectedSize) {
                        label.style.border = '3px solid #141F46';
                    } else {
                        label.style.border = '1px solid #141F46';
                    }
                });
            });
        });
    });
    </script>
</body>

</html>