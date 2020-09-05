<?php
    ob_start();
    session_start();
    include "lib/db-con.php";
    include "lib/login-fn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQ Mobile - Giỏ hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
</head>

<body>
    <div class="wrapper">
        <?php
            //Thêm header & menu        
            include "blocks/header.php";
            include "blocks/main-menu.php";
        ?>
        <div class="container">                    
            <div class="cart_checkout">
                <div class="cart_checkout_header">
                    <a href="index.php">Trang chủ</a>
                    <a href="products.php">Xem thêm sản phẩm khác</a>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="cart">
                        <div class="cart_checkout_title cart_title">
                            <h2>Giỏ hàng</h2>
                            <p>Tổng tiền: <span><?php if(isset($_SESSION["tong_tien"])) echo number_format($_SESSION["tong_tien"], 0,'.', '.'); ?>₫</span></p>
                        </div>
                        <form action="" method="post">
                            <div class="scroll_cart">
                                <ul class="cart_list">
                                <?php
                                        include "lib/cart-fn.php";
                                        
                                        if(isset($_GET['delete'])){
                                            unset($_SESSION['gio_hang'][$_GET['delete']]);
                                            header("location: cart-checkout.php");
                                            ob_end_flush();
                                        }
                                        if(isset($_GET['plus-id'])){
                                            $_SESSION['gio_hang'][$_GET['plus-id']]++;
                                            header("location: cart-checkout.php");
                                
                                        }
                                        if(isset($_GET['minus-id'])){
                                            if( $_SESSION['gio_hang'][$_GET['minus-id']] > 1)
                                            $_SESSION['gio_hang'][$_GET['minus-id']]--;
                                            header("location: cart-checkout.php");
                                
                                        } 
                                        
                                    
                                        $_SESSION["tong_tien"] = 0;
                                        while($row = mysqli_fetch_array($cartProduct)){                           
                                                $quantity = intval($_SESSION['gio_hang'][$row['id_SP']]);
                                                $gia = ($row['gia_SP'] - $row['khuyen_mai']) * $quantity; 
                                                $giam_gia = $row['khuyen_mai'] * $quantity;   
                                                $_SESSION["tong_tien"] += $gia;    
                                    ?>
                                    <li class="cart_item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                               <div class=" cart_item_img">
                                                    <img src="imgs/img-sp/<?php echo $row['img_SP_1']?>" alt="">
                                                    <a href="cart-checkout.php?delete=<?php echo $row['id_SP']?>" class="cart_item_delete"><i class="fa fa-times"></i>Xóa</a>
                                               </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="cart_item_desc">
                                                    <h2 class="cart_title_product"><?php echo $row['ten_SP']?></h2>
                                                    <p><i class="fa fa-check-circle"></i>Đã giảm giá <?php echo number_format($giam_gia, 0, ".", ".")?>₫</p>
                                                    <p><i class="fa fa-check-circle"></i>Cam kết sản phẩm chính hãng bảo hành 24 tháng</p>
                                                    <p><i class="fa fa-check-circle"></i>Miễn phí giao hàng tận nhà</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <div class="cart_item_price">
                                                    <p><?php echo number_format($gia, 0,'.', '.')?>₫</p>
                                                    <div class="cart_item_count">
                                                        <a class="btn btn_cart" href="cart-checkout.php?minus-id=<?php echo $row['id_SP']?>">
                                                            <i class="fa fa-minus"></i>
                                                        </a>
                                                        <input type="text" value="<?php echo $quantity?>" readonly>
                                                        <a class="btn btn_cart" href="cart-checkout.php?plus-id=<?php echo $row['id_SP']?>">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="checkout">
                            <div class="cart_checkout_title checkout_title">
                                <h2>Thông tin thanh toán</h2>
                            </div>
                            <?php
                                if(isset($_GET["logout"])){ header("location: cart-checkout.php");}  
                                if(!isset($_SESSION["id_ND"])){ 
                            ?>
                            <div class="cart_form_login">
                                <input type="text" class="form-control" name="user_name_login" placeholder="Tài khoản">
                                <input type="password" class="form-control" name="password_login" placeholder="Mật khẩu">
                                <button type="submit" class="btn" name="btn_login">Đăng nhập</button>
                                <span><?php if(isset($error_login)) echo $error_login ?></span>
                            </div>
                            <span>Đăng nhập để lấy thông tin hoặc mua hàng không cần đăng nhập. Vui lòng điền đầy đủ thông tin bên dưới</span>
                            <?php } ?>
                                <ul class="checkout_info_list">
                                    <li class="checkout_info_item">
                                        <div class="gender">
                                            <label for=""><input type="radio" name="gender" <?php if(isset($_SESSION["gioi_tinh"]) && $_SESSION["gioi_tinh"] == 0) echo "checked"; ?>>Anh</label>
                                            <label for=""><input type="radio" name="gender" <?php if(isset($_SESSION["gioi_tinh"]) && $_SESSION["gioi_tinh"] == 1) echo "checked"; ?>>Chị</label>
                                        </div>
                                    </li>
                                    <li class="checkout_info_item">
                                        <input type="text" class="form-control" placeholder="Họ và tên" value="<?php if(isset($_SESSION["ten_ND"])) echo $_SESSION["ten_ND"]; ?>">
                                    </li>
                                    <li class="checkout_info_item">
                                        <input type="text" class="form-control" placeholder="Số điện thoại" value="<?php if(isset($_SESSION["SDT"])) echo $_SESSION["SDT"]; ?>">
                                    </li>
                                    <li class="checkout_info_item">
                                        <input type="text" class="form-control" placeholder="Email" value="<?php if(isset($_SESSION["email"])) echo $_SESSION["email"]; ?>">
                                    </li>
                                    <li class="checkout_info_item">
                                        <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" value="<?php if(isset($_SESSION["dia_chi"])) echo $_SESSION["dia_chi"]; ?>">
                                    </li>
                                    <li class="checkout_info_item">
                                        <button type="submit" class="btn btn_checkout">Xác nhận mua hàng</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            //Thêm footer     
            include "blocks/footer.php";     
        ?>
    </div>
     <!-- Latest jQuery form server -->
     <script src='https://code.jquery.com/jquery.min.js'></script>
    <script type='text/javascript' src='js/main.js'></script>
</body>
</html>
