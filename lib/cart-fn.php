<?php
    if(!isset($_SESSION["gio_hang"])){
        $_SESSION["gio_hang"] = array();
    }
    if(!isset($_SESSION["tong_tien"])){
        $_SESSION["tong_tien"] = 0;
    }

    if(count($_SESSION["gio_hang"])>0){
        $x = implode(",", array_keys($_SESSION["gio_hang"]));
    } else {
        $x = 0;
?>
    <div class="cart_empty"><i class="fa fa-shopping-cart"><i class="fa fa-times"></i></i><p>Giỏ hàng không có sản phẩm nào !</p><a href="index.php">Tiếp tục mua sắm</a></div>
<?php } ?>
<?php
    $cartProduct = mysqli_query($mysqli,
        "SELECT * FROM chitietsanpham
        WHERE id_SP IN ($x)"
    );
?>