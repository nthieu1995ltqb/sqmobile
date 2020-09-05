<?php
    ob_start();
    session_start();
    include 'lib/db-con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQ Mobile - Chi tiết sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
</head>
<body>
    <?php
        //Thêm header & menu        
        include "blocks/header.php";       
        include "blocks/main-menu.php"; 
    ?>
    <div class="container">
        <?php
            if(isset($_GET["id_SP"])){
                $id_SP = $_GET["id_SP"];
                settype($id_SP, "int");
            } else {
                $id_SP = 1;
            }
            
            $productDetail = mysqli_query($mysqli, 
            "SELECT * FROM chitietsanpham
            WHERE id_SP = $id_SP"
            );
            $row = mysqli_fetch_array($productDetail);
            $gia = $row['gia_SP'] - $row['khuyen_mai'];

            $id_TL = $row['id_TL'];
            $TL = mysqli_query($mysqli,
            "SELECT ten_TL FROM the_loai
            WHERE id_TL = $id_TL"
            );
            $ten_TL =  mysqli_fetch_array($TL);

            //Thêm sản phẩm vào session giỏ hàng
            if(!isset($_SESSION["gio_hang"])){
                $_SESSION["gio_hang"] = array();
            } else if(isset($_POST["btn_buy"])){
                foreach($_POST["quantity"] as $id => $quantity){
                    if(isset($_SESSION["gio_hang"][$id])){
                        $_SESSION["gio_hang"][$id] += $quantity;
                    } else {
                        $_SESSION["gio_hang"][$id] = $quantity;           
                    }
                }
                $_SESSION["tong_tien"] += $gia * $quantity;
                header('location: cart-checkout.php');
                ob_end_flush();
            }   
        ?>

        <div class="product_detail">
            <div class="product-breadcroumb">
                <a href="index.php">Home</a>
                <a href="#"><?php echo $ten_TL['ten_TL'] ?></a>
                <a href="#"><?php echo $row["ten_SP"]?></a>
            </div>
            <div class="rating_star">
                <span>Đánh giá: </span>
                <i class="fa fa-star <?php if($row["danh_gia"] >= 1) echo 'star_active'; ?>"></i>
                <i class="fa fa-star <?php if($row["danh_gia"] >= 2) echo 'star_active'; ?>"></i>
                <i class="fa fa-star <?php if($row["danh_gia"] >= 3) echo 'star_active'; ?>"></i>
                <i class="fa fa-star <?php if($row["danh_gia"] >= 4) echo 'star_active'; ?>"></i>
                <i class="fa fa-star <?php if($row["danh_gia"] >= 5) echo 'star_active'; ?>"></i>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="product_detail_img_zoom">
                        <img src="imgs/img-sp/<?php echo $row["img_SP_1"]?>" alt="">
                    </div>
                    <ul class="product_detail_img_sm">
                        <li><img src="imgs/img-sp/<?php echo $row["img_SP_2"]?>" alt=""></li>
                        <li><img src="imgs/img-sp/<?php echo $row["img_SP_3"]?>" alt=""></li>
                        <li><img src="imgs/img-sp/<?php echo $row["img_SP_4"]?>" alt=""></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="product_detail_info">
                        <h2 class="title"><?php echo $row["ten_SP"]?></h2>
                        <p class="price"><?php echo number_format($gia, 0,'.', '.')?>₫ <span class="cost"><?php echo number_format($row["gia_SP"], 0,'.', '.')?>₫</span></p>
                        <form action="" method="post" class="product_detail_info_form">
                            <input type="text" class="form-control" value="1" name="quantity[<?php echo $row["id_SP"]?>]">
                            <button type="submit" name="btn_buy" class="btn btn_add_cart">MUA NGAY
                                <span class="free_ship">Giao hàng miễn phí</span>
                            </button>
                        </form>
                        <div class="product_desc">
                            <h2>Thông số kĩ thuật</h2>
                              <table>      
                                    <tr>
                                        <td class="product_desc_detail">Màn hình:</td>
                                        <td><span><?php echo $row["man_hinh"]?></span></td>
                                    </tr> 
                                    <tr>
                                        <td class="product_desc_detail">Hệ điều hành:</td>
                                        <td><span><?php echo $row["HDH"]?></span></td>
                                    </tr>
                                    <tr>
                                        <?php switch(intval($row['id_TL'])){
                                            case 1:
                                        ?>
                                            <td class="product_desc_detail">Camera sau:</td>
                                            <td><span><?php echo $row["camera_sau"]?></span></td>
                                        <?php   
                                            break;
                                            case 2:
                                        ?>
                                            <td class="product_desc_detail">Ổ cứng:</td>
                                            <td><span><?php echo $row["o_cung"]?></span></td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <?php switch($row['id_TL']){
                                            case 1:
                                        ?>
                                            <td class="product_desc_detail">Camera trước:</td>
                                            <td><span><?php echo $row["camera_truoc"]?></span></td>
                                         <?php
                                            break;   
                                            case 2:
                                        ?>
                                            <td class="product_desc_detail">Card màn hình:</td>
                                            <td><span><?php echo $row["card_man_hinh"]?></span></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="product_desc_detail">RAM:</td>
                                        <td><span><?php echo $row["RAM"]?></span></td>
                                    </tr>
                                    <tr>
                                        <?php switch($row['id_TL']){
                                            case 1:
                                        ?>
                                            <td class="product_desc_detail">Bộ nhớ trong:</td>
                                            <td><span><?php echo $row["bo_nho_trong"]?></span></td>
                                         <?php
                                            break;   
                                            case 2:
                                        ?>
                                            <td class="product_desc_detail">CPU:</td>
                                            <td><span><?php echo $row["CPU"]?></span></td>
                                        <?php }?>                                 
                                    </tr>
                                    <tr>
                                        <?php switch($row['id_TL']){
                                            case 1:
                                        ?>
                                            <td class="product_desc_detail">PIN:</td>
                                            <td><span><?php echo $row["PIN"]?></span></td>
                                         <?php
                                            break;   
                                            case 2:
                                        ?>
                                            <td class="product_desc_detail">Kích thước:</td>
                                            <td><span><?php echo $row["kich_thuoc"]?></span></td>
                                        <?php }?>                               
                                    </tr>
                              </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                            <div class="product_policy">
                                <table>
                                    <tr>
                                        <td><i class="fa fa-archive"></i></td><td>Bộ sản phẩm gồm: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng</td>
                                    </tr>
                                   <tr> 
                                       <td><i class="fa fa-shield"></i></td><td>Bảo hành chính hãng 12 tháng</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-life-ring"></i></td><td>Lỗi là đổi mới trong 1 tháng</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card_icon">
                                <i class="fa fa-cc-discover"></i>
                                <i class="fa fa-cc-mastercard"></i>
                                <i class="fa fa-cc-paypal"></i>
                                <i class="fa fa-cc-visa"></i>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">                        
                        <h3 class="related_products_title">Sản phẩm liên quan</h3>
                        <?php
                            $id_TH = $row['id_TH'];
                            $id_TL = $row['id_TL'];
                            $relatedProduct = mysqli_query($mysqli, 
                                "SELECT * FROM chitietsanpham 
                                WHERE id_SP <> $id_SP
                                AND id_TH = $id_TH AND id_TL = $id_TL
                                ORDER BY RAND()
                                LIMIT 0,3
                                ");
    
                        while($row_realated = mysqli_fetch_array($relatedProduct)){
                            $gia_realated = $row_realated['gia_SP'] - $row_realated['khuyen_mai'];
                        ?>
                                <a href="product-detail.php?id_SP=<?php echo $row_realated['id_SP']?>" class="related_products">
                                    <img src="imgs/img-sp/<?php echo $row_realated['img_SP_1'] ?>" alt="">
                                    <div class="related_products_desc">
                                        <p><?php echo $row_realated['ten_SP']?></p>
                                        <p class="price">
                                            <?php echo number_format($gia_realated, 0,'.', '.')?>₫ 
                                            <span class="cost"><?php echo number_format($row_realated["gia_SP"], 0,'.', '.')?>₫</span>
                                        </p>
                                        <p>Tặng 2 suất mua đồng hồ thời trang giảm 40%</p>
                                    </div>
                                </a>
                                <?php } ?>
                        </div>
                   </div>
                </div>
            </div>
        </div>  
    </div>  
    <?php
        //Thêm footer     
        include "blocks/footer.php";     
    ?> 
</body>
</html>