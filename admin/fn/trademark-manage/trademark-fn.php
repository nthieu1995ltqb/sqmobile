<?php
    include "fn/category-manage/convert-string.php";
    
    
    //Thêm mới thương hiệu
    if(isset($_POST["add_trademark"])){
        $error =  array();

        $fileName = $_FILES['img_tm']['name'];
        $fileTmpName = $_FILES['img_tm']['tmp_name'];
        $fileSize = $_FILES['img_tm']['size'];
        $fileError = $_FILES['img_tm']['error'];
        $fileType = $_FILES['img_tm']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
    
        $allowed = array( 'jpg', 'jpeg', 'png');
    
        if(in_array( $fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    // $fileNameNew1 = uniqid('',true).'.'.$fileActualExt1;
                    $fileDest = '../imgs/thuong-hieu/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header('loacation: add-product.php?uploadsuccess');
                }else {
                    $error["img_tm"] = 'Ảnh tải lên quá lớn';
                }
            } else {
              $error["img_tm"] = 'Ảnh tải lên bị lỗi';
            }
        } else {
          $error["img_tm"] = 'Ảnh tải lên phải đúng định dạng jpg hoặc png';
        }

        $name_tm = $_POST["name_tm"];
        $name_tm_no = changeTitle($name_tm);
        $id_TL = $_POST["category_tm"];
        $addTrademark = mysqli_query($mysqli,
        "INSERT INTO thuong_hieu (ten_TH, ten_TH_khongdau, id_TL, img_TH)
        VALUE ('$name_tm', '$name_tm_no', '$id_TL', '$fileName' )"
    );
    header("location: trademark-manage.php?page-active=trademark-manage");
    }

    //Xóa thể loại
    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        $id_TH = $_GET["id_TH"];
        $deleteTrademark = mysqli_query($mysqli,
        "DELETE FROM thuong_hieu WHERE id_TH = $id_TH"  
        );
        header("location: trademark-manage.php?page-active=trademark-manage");
    };

    //Sửa thể loại
    if(isset($_GET["action"]) && $_GET["action"] == "update"){
        $id_TH = $_GET["id_TH"];
        $fetchTrademarkById = mysqli_query($mysqli,
        "SELECT * FROM thuong_hieu WHERE id_TH = $id_TH"  
    );
    $row_id = mysqli_fetch_array($fetchTrademarkById);
    };

    if(isset($_POST["update_trademark"])){
        $name_tm = $_POST["name_tm"];
        $id_TL = $_POST["category_tm"];
        $name_tm_no = changeTitle($name_tm);
        $updateCategory = mysqli_query($mysqli,
        "UPDATE thuong_hieu SET
        ten_TH = '$name_tm',
        ten_TH_khongdau = '$name_tm_no',
        id_TL = '$id_TL'
        WHERE id_TH = $id_TH"
        );
        header("location: trademark-manage.php?page-active=trademark-manage");
    }
?>