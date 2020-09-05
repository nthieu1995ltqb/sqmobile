<?php
    include "validation-add-product.php";

    if(empty($error) && isset($_POST["add_product"])){
        $luot_xem = rand(1000, 10000);
        $danh_gia = rand(3,5);

        $addProduct = mysqli_query($mysqli,
            "INSERT INTO chitietsanpham (id_TL, id_TH, ten_SP, tinh_trang, gia_SP, khuyen_mai, danh_gia, img_SP_1, img_SP_2, img_SP_3, img_SP_4, man_hinh, HDH, camera_sau,
            camera_truoc, RAM, bo_nho_trong, PIN, luot_xem) 
            VALUE ('$category_pdt', '$trademark_pdt', '$name_pdt', '$status_pdt', '$price_pdt', '$discount_pdt', '$danh_gia', '$fileName1', '$fileName2', '$fileName3', '$fileName4', 
            '$screen_pdt', '$system_pdt', '$rear_camera_pdt', '$front_camera_pdt', '$ram_pdt', '$memory_pdt', '$pin_pdt', '$luot_xem')"
        );

        if(!$addProduct){
            if(strpos(mysqli_error($mysqli), "Duplicate entry") !== false){
                $message_form = "Lỗi ! Sản phẩm này đã tồn tại. Vui lòng chọn sản phẩm khác";
            }
        } else {
                $message_form = "Thêm sản phẩm thành công !";

                 $name_pdt = "";
                 $status_pdt = 1;
                 $price_pdt = "";
                 $discount_pdt = "";
                 $screen_pdt = "";
                 $system_pdt = "";
                 $rear_camera_pdt = "";
                 $front_camera_pdt = "";
                 $ram_pdt = "";
                 $memory_pdt = "";
                 $pin_pdt = "";
            ?>
    <?php
        } 
    }
?>