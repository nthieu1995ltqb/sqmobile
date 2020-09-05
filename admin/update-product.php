<?php
    if(isset($_GET["action"]) && $_GET["action"] == "update"){
        $id_SP = $_GET["id_SP"];
        $id_TL = $_GET["id_TL"];
        $fetchProductEdit = mysqli_query($mysqli,
        "SELECT * FROM chitietsanpham WHERE id_SP = $id_SP"
    );
        $row = mysqli_fetch_array($fetchProductEdit);
        $name_pdt = $row["ten_SP"];
        $status_pdt = $row["tinh_trang"];
        $price_pdt = $row["gia_SP"];
        $discount_pdt = $row["khuyen_mai"];
        $trademark_pdt = $row["id_TH"];
        $category_pdt = $row["id_TL"];
        $screen_pdt = $row["man_hinh"];
        $system_pdt = $row["HDH"];
        $rear_camera_pdt = $row["camera_sau"];
        $front_camera_pdt = $row["camera_truoc"];
        $ram_pdt = $row["RAM"];
        $memory_pdt = $row["bo_nho_trong"];
        $pin_pdt = $row["PIN"];
        $hard_drive_pdt = $row["o_cung"];
        $graphic_card_pdt = $row["card_man_hinh"];
        $cpu_pdt = $row["CPU"];
        $size_pdt = $row["kich_thuoc"];
        
        if(isset($_POST["update_product"])){
            $name_pdt = $_POST["name_pdt"];
            $status_pdt = $_POST["status_pdt"];
            $price_pdt = $_POST["price_pdt"];
            $discount_pdt = $_POST["discount_pdt"];
            $trademark_pdt = $_POST["trademark_pdt"];
            $category_pdt = $_POST["category_pdt"];
            $screen_pdt = $_POST["screen_pdt"];
            $system_pdt = $_POST["system_pdt"];
            $ram_pdt = $_POST["ram_pdt"]; 

            
            
            switch($id_TL){
                case 1:  
                    $rear_camera_pdt = $_POST["rear_camera_pdt"];
                    $front_camera_pdt = $_POST["front_camera_pdt"];
                    $memory_pdt = $_POST["memory_pdt"];
                    $pin_pdt = $_POST["pin_pdt"];
                                                                                  
                    $updateProduct = mysqli_query($mysqli,
                    "UPDATE chitietsanpham SET
                    ten_SP = '$name_pdt',
                    tinh_trang = '$status_pdt',
                    gia_SP = '$price_pdt',
                    khuyen_mai = '$discount_pdt',
                    id_TH = '$trademark_pdt',
                    id_TL = '$category_pdt',
                    man_hinh = '$screen_pdt',
                    HDH = '$system_pdt',
                    camera_sau = '$rear_camera_pdt',
                    camera_truoc = '$front_camera_pdt',
                    RAM = '$ram_pdt',
                    bo_nho_trong = '$memory_pdt',
                    PIN = '$pin_pdt'
                    WHERE id_SP = '$id_SP'"
                );
                    break;
                case 2:
                    $hard_drive_pdt = $_POST["hard_drive_pdt"];
                    $graphic_card_pdt = $_POST["graphic_card_pdt"];
                    $size_pdt = $_POST["size_pdt"];
                    $cpu_pdt = $_POST["cpu_pdt"];  

                    $updateProduct = mysqli_query($mysqli,
                    "UPDATE chitietsanpham SET
                    ten_SP = '$name_pdt',
                    tinh_trang = '$status_pdt',
                    gia_SP = '$price_pdt',
                    khuyen_mai = '$discount_pdt',
                    id_TH = '$trademark_pdt',
                    id_TL = '$category_pdt',
                    man_hinh = '$screen_pdt',
                    HDH = '$system_pdt',
                    RAM = '$ram_pdt',
                    o_cung = '$hard_drive_pdt',
                    card_man_hinh = '$graphic_card_pdt',
                    kich_thuoc = '$size_pdt',
                    CPU = '$cpu_pdt'
                    WHERE id_SP = '$id_SP'");
                    break;
        }
    }
    }
?>