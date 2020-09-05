<?php
    ob_start();

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
        header("location: ../index.php");
    }   
?>
<header>
    <div class="header">
        <img src="../imgs/logo.png" alt="logo" class="header_logo">
        <div class="header_menu">
            <ul class="header_menu_list">
                <li class="header_menu_item"><a href="../index.php">Xem trang web<i class="fa fa-long-arrow-right"></i></a></li>
                <li class="header_menu_item"><a href="#"><i class="fa fa-lock"></i>Admin: <?php echo $_SESSION["ten_ND"]?></a><a href="?logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</header>