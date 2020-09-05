<?php
    //Đăng xuất
    if(isset($_GET['logout'])){
        unset($_SESSION["id_ND"]);
        unset($_SESSION["ten_dang_nhap"]);
        unset($_SESSION["mat_khau"]);
        unset($_SESSION["ten_ND"]);
        unset($_SESSION["gioi_tinh"]);
        unset($_SESSION["dia_chi"]);
        unset($_SESSION["SDT"]);
        unset($_SESSION["phan_quyen"]);
        unset($_SESSION["email"]);
        header("location");
    }   

    if(isset($_SESSION['gio_hang'])){
        $count = 0;
        $cart = $_SESSION['gio_hang'];
        foreach($cart as $id => $quantity){
            $count += $quantity;
        }
    } else {
        $count = 0;
    }
?>

<header class="header">
    <div class="container">
        <div class="header_inner">
            <div class="header_left">
                <a href="index.php" class="header_logo"><img src="imgs/logo.png" alt="logo"></a>
                <form action="search.php" method="GET">
                    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm ..." value="">
                    <i class="fa fa-search"></i>
                </form>
            </div>
            <nav class="header_menu">
                    <ul class="header_list_menu">
                        <li class="header_menu_item">
                            <a href="cart-checkout.php" class="menu_link menu_cart">
                                <i class="fa fa-shopping-cart"></i>
                                Giỏ hàng - <?php if(isset($_SESSION["tong_tien"])) echo number_format($_SESSION["tong_tien"], 0,'.', '.'); ?>₫
                                <?php if($count > 0){ ?>
                                    <span class="number_count"><?php echo $count ?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="header_menu_item">
                            <a href="cart-checkout.php" class="menu_link cart_checkout_link">Thanh toán</a>
                        </li>
                        <li class="header_menu_item">
                            <?php
                                if(!isset($_SESSION["id_ND"])){
                            ?>
                                    <a href="login.php" class="menu_link"><i class="fa fa-sign-in"></i>Đăng nhập </a>
                            <?php
                                } else {
                                    
                            ?>
                                <span class="name_user">
                                    <a href="admin"><?php if($_SESSION["phan_quyen"] == 1) echo "Admin:"?></a>
                                    <?php echo $_SESSION["ten_ND"] ?>
                                </span>
                        
                                <a href="?logout" name="btn_logout"><i class="fa fa-sign-out logout_icon"></i></a>
                            <?php } ?>                                              
                        </li>
                    </ul>
                </nav>
                <div class="header_menu_mb">
                    <a href="cart-checkout.php" class="header_cart_mb">
                        <i class="fa fa-shopping-cart"></i>
                        <?php if($count > 0){ ?>
                            <span class="number_count_mb"><?php echo $count ?></span>
                        <?php } ?>
                    </a>
                    <a href="index.php" class="header_logo"><img src="imgs/logo.png" alt="logo"></a> 
                    <a href="login.php" class="header_login"><i class="fa fa-sign-in"></i></a>
                    <a href="javascript:void(0);" class="icon_toggle_mb">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
        </div>
    </div>
</header>
<div class="header_sub_mb">
    <form action="">
        <input type="text" name="search" placeholder="Bạn tìm gì ...">
        <button class="btn btn_search">Tìm kiếm</button>
    </form>
    <div class="login_register">
    </div>
</div>