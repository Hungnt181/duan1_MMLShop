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
                    <form action="" method="post">
                        <div class="color">
                            <label for="">
                                <h3>Màu sắc</h3>
                            </label>
                            <div class="box_color">
                                <!-- <input type="button" value="Màu đỏ" name="Màu đỏ" id="red">
                                <input type="button" value="Màu trắng" name="Màu trắng" id="white"> -->
                                <?php
                                    $arayColor = [];
                                     foreach ($dsProDetail as $pro_dt) {
                                        
                                        if (!in_array($pro_dt-> pro_color,$arayColor)) {
                                            $arayColor[] =   $pro_dt-> pro_color;
                                        }
                                     }
                                    //  var_dump($arayColor);
                                ?>
                                <?php foreach ($arayColor as $color) : ?>
                                    <input type="button" value="<?= $color?>" name="<?= $color?>" id="<?=$color?>" 
                                    
                                    style="width: 100px; height: 40px; border-radius: 20px; border: 1px solid #ccc; text-align: center;
                                     line-height: 40px; cursor: pointer; margin-right: 10px; background-color: #fff;"
                                    
                                    >   
                                <?php endforeach; ?>
                                
                            </div>
                        </div>

                        <div class="size">
                            <label for="">
                                <h3>Kích cỡ</h3>
                            </label>

                            <div class="box_size">
                                <!-- <input type="button" value="16x16cm" name="16x16cm" id="sz16">
                                <input type="button" value="14x14cm" name="14x14cm" id="sz14">
                                <input type="button" value="12x12cm" name="12x12cm" id="sz12"> -->

                                <?php
                                    $araySize = [];
                                     foreach ($dsProDetail as $pro_dt) {
                                        
                                        if (!in_array($pro_dt->pro_size,$araySize)) {
                                            $araySize[] =   $pro_dt-> pro_size;
                                        }
                                     }
                                    //  var_dump($araySize);
                                ?>
                                <?php foreach ($araySize as $size) : ?>
                                    <input type="button" value="<?= $size?>" name="<?= $size?>" id="<?=$size?>" 
                                    
                                    style="width: 100px; height: 40px; border-radius: 20px; border: 1px solid #ccc; text-align: center;
                                     line-height: 40px; cursor: pointer; margin-right: 10px; background-color: #fff;"
                                    >   
                                <?php endforeach; ?>
                                
                            </div>
                        </div>

                        <!-- <div class="price_detail">
                            <label for="">
                                <h3>Giá: </h3> <?=$dsProDetail->pro_price?>
                            </label>
                        </div> -->
                        <div class="contact">
                            <div class="phone">
                                <i class="fa-solid fa-phone"></i>
                                1900 6868
                            </div>

                            <div class="buy">
                                <a href="">
                                    <button type="submit">MUA HÀNG</button>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>



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
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dignissimos sint possimus nemo velit quia earum, nesciunt,
                explicabo culpa sit adipisci esse libero reiciendis omnis pariatur aspernatur eius aliquam cupiditate
                temporibus.
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
                <div class="pro_item">
                    <div class="quick_act">
                        <form action="">
                            <button><i class="fa-regular fa-heart"></i></button>
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                            <button><i class="fa-regular fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="img_pro">
                        <a href=""><img src="../img/product/binh-hoa-nho.jpg" alt=""></a>
                    </div>
                    <div class="content_pro">
                        <div class="name_pro">
                            <a href="">Bình hoa nhỏ</a>
                        </div>
                        <div class="price_pro">
                            <p>Liên hệ <span></span></p>
                        </div>
                    </div>
                </div>
                <div class="pro_item">
                    <div class="quick_act">
                        <form action="">
                            <button><i class="fa-regular fa-heart"></i></button>
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                            <button><i class="fa-regular fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="img_pro">
                        <a href=""><img src="../img/product/ghe-go.jpg" alt=""></a>
                    </div>
                    <div class="content_pro">
                        <div class="name_pro">
                            <a href="">Ghế gỗ</a>
                        </div>
                        <div class="price_pro">
                            <p>Liên hệ<span></span></p>
                        </div>
                    </div>
                </div>
                <div class="pro_item">
                    <div class="quick_act">
                        <form action="">
                            <button><i class="fa-regular fa-heart"></i></button>
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                            <button><i class="fa-regular fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="img_pro">
                        <a href=""><img src="../img/product/gau-bong.png" alt=""></a>
                    </div>
                    <div class="content_pro">
                        <div class="name_pro">
                            <a href="">Gấu bông</a>
                        </div>
                        <div class="price_pro">
                            <p>250,000 <span>VND</span></p>
                        </div>
                    </div>
                </div>
                <div class="pro_item">
                    <div class="quick_act">
                        <form action="">
                            <button><i class="fa-regular fa-heart"></i></button>
                            <button><i class="fa-solid fa-cart-shopping"></i></button>
                            <button><i class="fa-regular fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="img_pro">
                        <a href=""><img src="../img/product/dong-ho-go.png" alt=""></a>
                    </div>
                    <div class="content_pro">
                        <div class="name_pro">
                            <a href="">Đồng hồ gỗ</a>
                        </div>
                        <div class="price_pro">
                            <p>30,000 <span>VND</span></p>
                        </div>
                    </div>
                </div>

                <!-- End pro_item -->
            </div>
        </div>



    </main>

    <!-- footer -->

    <footer>
        <div class="mail_voucher">
            <h3>đừng bỏ lỡ chương trình giảm giá của chúng tôi</h3>
            <p>Đăng ký để nhận những sản phẩm và tin tức mới nhất cập nhật hàng ngày
                nhanh nhất.
            </p>
            <form action="" method="post">
                <input type="email" placeholder="Email của bạn">
                <button>ĐĂNG KÝ</button>
            </form>
        </div>
        <div class="belowfoot w95">
            <div class="company">
                <a href=""><img src="img/logo_darkblue_full.svg" alt=""></a>
                <strong>MML - INTERIOR HOUSE STORE</strong>
                <p>Địa chỉ: Tầng 4, Tòa nhà L (L401) - Số 02, đường Trịnh Văn Bô,
                    Nam Từ Liêm, Hà Nội (Tòa nhà FPT Polytechnic)
                </p>
                <p>Điện thoại: 1900 1234 - 0123456789</p>
                <p>Email: mmlstore@gmail.com</p>
                <div class="social_media">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="list_options">
                <div class="options_item">
                    <h4>LIÊN KẾT</h4>
                    <a href="">Trang chủ</a>
                    <a href="">Giới thiệu</a>
                    <a href="">Sản phẩm</a>
                    <a href="">Tin tức</a>
                    <a href="">Thư viện</a>
                    <a href="">Liên hệ</a>
                </div>
                <div class="options_item">
                    <h4>CHÍNH SÁCH</h4>
                    <a href="">Hướng dẫn mua hàng</a>
                    <a href="">Hướng dẫn đổi trả hàng</a>
                    <a href="">Hướng dẫn thanh toán</a>
                    <a href="">Chính sách giao hàng</a>
                    <a href="">Chính sách bảo mật</a>
                    <a href="">Chính sách khuyến mại</a>
                </div>
            </div>
        </div>
        <hr>
        <h6>Copyright © 2024 MML. All rights reserved.</h6>
    </footer>

    <script>
                // Lấy tất cả các nút input có class 'box_color'
        const colorButtons = document.querySelectorAll('.box_color input[type="button"]');

        // Thêm sự kiện click cho từng nút
        colorButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Lấy giá trị 'id' của nút được chọn
                // console.log("<?= $color?>");
                const selectedColor = button.id;
                console.log('Màu sắc được chọn:', selectedColor);

                // Thay đổi thuộc tính border của nút được chọn
                button.style.border = '2px solid #000'; // Thay đổi border thành 2px solid black

                // Xóa border của các nút khác
                colorButtons.forEach(btn => {
                    if (btn !== button) {
                        btn.style.border = 'none';
                    }
                });
            });
        });

        const redButton = document.getElementById('<?=$color?>');
         
        redButton.style.border = '2px solid #000';


        const sizeButtons = document.querySelectorAll('.box_size input[type="button"]');


        sizeButtons.forEach(button => {
            button.addEventListener('click', () => {

                const selectedSize = button.id;
                console.log('Màu sắc được chọn:', selectedSize);


                button.style.border = '2px solid #000';


                sizeButtons.forEach(btn => {
                    if (btn !== button) {
                        btn.style.border = 'none';
                    }
                });
            });
        });

        const sz16Button = document.getElementById('<?=$size?>');
        sz16Button.style.border = '2px solid #000';

        // -----------jquery for angle-down icon beside sub menu---------
        $(document).ready(function () {
            // Tìm <li> có sub
            $('.sub_menu').parent('li').addClass('has_child');
        })
    </script>

</body>

</html>