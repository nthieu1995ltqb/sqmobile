<?php
    session_start();
    include "../lib/db-con.php";
    include "../lib/home-fn.php";
    include "fn/admin-fn.php";
    include "fn/product-manage/add-product-mobile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Website</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src='https://code.jquery.com/jquery.min.js'></script>
    <script type="text/javascript" src="js/admin.js"></script>
</head>

<body>
    <?php
        include "blocks/header.php";
    ?>
    <div class="row container_admin">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?php 
                include "blocks/aside.php";
            ?>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <div class="content">
                <div class="content_header">
                    <div class="content_header_left">
                        <a href="#">Trang chủ</a><i class="fa fa-angle-right"></i><a href="#">Thêm sản phẩm</a>
                    </div>
                    <div class="add_new_product"><a href="product-manage.php">Xem sản phẩm</a></div>
                </div>
                <div class="add_product_content">

                    <?php
                        include "update-product.php";
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <ul class="add_product_left">
                                        <li>
                                            <label for="name">Tên sản phẩm: </label>
                                            <input type="text" class="form-control" value="<?php if(isset($name_pdt)) echo $name_pdt; ?>" name="name_pdt">
                                            <span class="message_form"><?php if(isset($error["name_pdt"])) echo $error["name_pdt"] ?></span>
                                        </li>
                                        <li>
                                            <input type="radio" checked <?php if(isset($status_pdt) && $status_pdt == 1) echo "checked"?> name="status_pdt" value="1">
                                            <label for="status">Còn hàng</label>
                                            <input type="radio" <?php if(isset($status_pdt) && $status_pdt == 0) echo "checked"?> name="status_pdt" value="0">
                                            <label for="status">Hết hàng</label>
                                        </li>
                                        <li>
                                            <label for="name">Giá gốc: </label>
                                            <input type="text" class="form-control" value="<?php if(isset($price_pdt)) echo $price_pdt; ?>" name="price_pdt">
                                            <span class="message_form"><?php if(isset($error["price_pdt"])) echo $error["price_pdt"] ?></span>
                                        </li>
                                        <li>
                                            <label for="name">Khuyến mãi: </label>
                                            <input type="text" class="form-control" value="<?php if(isset($discount_pdt)) echo $discount_pdt; ?>" name="discount_pdt">
                                            <span class="message_form"><?php if(isset($error["discount_pdt"])) echo $error["discount_pdt"] ?></span>
                                        </li>
                                        <li>
                                            <label for="image">Thêm ảnh sản phẩm</label>
                                            <input class="form-control-file upload_img" type="file" name="img_1_upload">
                                            <span class="message_form"><?php if(isset($error["img_1_upload"])) echo $error["img_1_upload"] ?></span>
                                            <input class="form-control-file upload_img" type="file" name="img_2_upload">
                                            <span class="message_form"><?php if(isset($error["img_2_upload"])) echo $error["img_2_upload"] ?></span>
                                            <input class="form-control-file upload_img" type="file" name="img_3_upload">
                                            <span class="message_form"><?php if(isset($error["img_3_upload"])) echo $error["img_3_upload"] ?></span>
                                            <input class="form-control-file upload_img" type="file" name="img_4_upload">
                                            <span class="message_form"><?php if(isset($error["img_4_upload"])) echo $error["img_4_upload"] ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="add_product_right">
                                        <ul>
                                            <li class="table_info_right">
                                                <table>
                                                    <tr>
                                                        <td><label for="category">Thương hiệu: </label></td>
                                                        <td>
                                                            <select class="form-control" id="trademark_pdt" name="trademark_pdt">
                                                                <?php
                                                                   while( $row_trademark = mysqli_fetch_array($fetchTrademarkAll)){
                                                                ?>
                                                                <option value="<?php  echo $row_trademark["id_TH"] ?>" <?php if($row["id_TH"] == $row_trademark["id_TH"]) echo "selected" ?>><?php echo $row_trademark["ten_TH"] ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="category">Thể loại: </label></td>
                                                        <td>
                                                            <select class="form-control" id="category_pdt" name="category_pdt">
                                                                <option value="1" >Điện thoại</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </li>
                                            <li class="specification">
                                                <h2>Thông số kỹ thuật:</h2>
                                                <ul>
                                                    <li>
                                                        <input class="form-control" type="text" placeholder="Màn hình" value="<?php if(isset($screen_pdt)) echo $screen_pdt; ?>" name="screen_pdt">
                                                        <span class="message_form"><?php if(isset($error["screen_pdt"])) echo $error["screen_pdt"] ?></span>
                                                    </li>
                                                    <li>
                                                        <input class="form-control" type="text" placeholder="Hệ điều hành" value="<?php if(isset($system_pdt)) echo $system_pdt; ?>" name="system_pdt">
                                                        <span class="message_form"><?php if(isset($error["system_pdt"])) echo $error["system_pdt"] ?></span>
                                                    </li>
                                                    <?php
                                                        switch($_GET["id_TL"]){
                                                            case 1:
                                                    ?>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Camera sau" value="<?php if(isset($rear_camera_pdt)) echo $rear_camera_pdt; ?>" name="rear_camera_pdt">
                                                                    <span class="message_form"><?php if(isset($error["rear_camera_pdt"])) echo $error["rear_camera_pdt"] ?></span>
                                                                </li>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Camera trước" value="<?php if(isset($front_camera_pdt)) echo $front_camera_pdt; ?>" name="front_camera_pdt">
                                                                    <span class="message_form"><?php if(isset($error["front_camera_pdt"])) echo $error["front_camera_pdt"] ?></span>
                                                                </li>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Bộ nhớ trong" value="<?php if(isset($memory_pdt)) echo $memory_pdt; ?>"  name="memory_pdt">
                                                                    <span class="message_form"><?php if(isset($error["memory_pdt"])) echo $error["memory_pdt"] ?></span>
                                                                </li>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="PIN" value="<?php if(isset($pin_pdt)) echo $pin_pdt; ?>" name="pin_pdt">
                                                                    <span class="message_form"><?php if(isset($error["pin_pdt"])) echo $error["pin_pdt"] ?></span>
                                                                </li>
                                                        <?php  
                                                            break;
                                                            case 2: 
                                                        ?>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Ổ cứng" value="<?php if(isset($hard_drive_pdt)) echo $hard_drive_pdt; ?>" name="hard_drive_pdt">
                                                                    <span class="message_form"><?php if(isset($error["hard_drive_pdt"])) echo $error["hard_drive_pdt"] ?></span>
                                                                </li> 
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="CPU" value="<?php if(isset($cpu_pdt)) echo $cpu_pdt; ?>" name="cpu_pdt">
                                                                    <span class="message_form"><?php if(isset($error["cpu_pdt"])) echo $error["cpu_pdt"] ?></span>
                                                                </li>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Card màn hình" value="<?php if(isset($graphic_card_pdt)) echo $graphic_card_pdt; ?>" name="graphic_card_pdt">
                                                                    <span class="message_form"><?php if(isset($error["graphic_card_pdt"])) echo $error["graphic_card_pdt"] ?></span>
                                                                </li>
                                                                <li>
                                                                    <input class="form-control" type="text" placeholder="Kích thước" value="<?php if(isset($size_pdt)) echo $size_pdt; ?>" name="size_pdt">
                                                                    <span class="message_form"><?php if(isset($error["size_pdt"])) echo $error["size_pdt"] ?></span>
                                                                </li>
                                                    <?php
                                                        break;
                                                        }
                                                    ?>
                                                    
                                                    <li>
                                                        <input class="form-control" type="text" placeholder="RAM" value="<?php if(isset($ram_pdt)) echo $ram_pdt; ?>" name="ram_pdt">
                                                        <span class="message_form"><?php if(isset($error["ram_pdt"])) echo $error["ram_pdt"] ?></span>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="add_product_btn">
                                <button type="submit" name="<?php if(isset($_GET["action"]) && $_GET["action"] == "update"){ echo "update_product"; } else { echo "add_product"; }?>" class="btn btn_add">Thêm sản phẩm</button>
                                <p class="message_form"><?php if(isset($message_form)) echo $message_form; ?></p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
           $("#trademark_pdt").change(function(){
                var id_TH = $(this).val();
                    $.get("fn/product-manage/category-option.php", { id_TH: id_TH}, function(data){
                    $("#category_pdt").html(data);
                })
           });
        })
    </script>
</body>
</html>