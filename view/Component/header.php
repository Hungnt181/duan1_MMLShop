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
                <li><a href="">trang chủ</a></li>
                <li><a href="">giới thiệu</a></li>
                <li class="box_sub_menu">
                    <a href="">sản phẩm</a>
                    <ul class="sub_menu">
                        <!-- <?php
                            var_dump($dsCategory);
                        ?> -->

                        
                        <?php foreach($dsCategory as $cate) : ?>

                            <?php
                            if ($cate->cate_status == 1 ) {
                                ?>
                                    <a href=""><li><?= $cate->cate_name?></li></a>
                                <?php
                            }
                            ?>
                            
                        <?php endforeach;?>
                    </ul>
                </li>
                <li><a href="">thư viện</a></li>
                <li><a href="">tin tức</a></li>
                <li><a href="">liên hệ</a></li>
            </ul>
        </div>
        <div class="tool">
            <ul>
                <li >
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