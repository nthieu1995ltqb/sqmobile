<?php
    include "convert-string.php";
    
    
    //Thêm mới thể loại
    if(isset($_POST["add_category"])){
        $name_ct = $_POST["name_ct"];
        $id_icon = $_POST["id_icon"];
        $name_ct_no = changeTitle($name_ct);
        $addCategory = mysqli_query($mysqli,
        "INSERT INTO the_loai (ten_TL, ten_TL_khongdau, ma_icon)
        VALUE ('$name_ct', '$name_ct_no', '$id_icon')"
    );
    header("location: category-manage.php?page-active=category-manage");
    }

    //Xóa thể loại
    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        $id_TL = $_GET["id_TL"];
        $deleteCategory = mysqli_query($mysqli,
        "DELETE FROM the_loai WHERE id_TL = $id_TL"  
        );
        header("location: category-manage.php?page-active=category-manage");
    };

    //Sửa thể loại
    if(isset($_GET["action"]) && $_GET["action"] == "update"){
        $id_TL = $_GET["id_TL"];
        $fetchCategoryById = mysqli_query($mysqli,
        "SELECT * FROM the_loai WHERE id_TL = $id_TL"  
    );
    $row_id = mysqli_fetch_array($fetchCategoryById);
    };

    if(isset($_POST["update_category"])){
        $name_ct = $_POST["name_ct"];
        $id_icon = $_POST["id_icon"];
        $name_ct_no = changeTitle($name_ct);
        $updateCategory = mysqli_query($mysqli,
        "UPDATE the_loai SET
        ten_TL = '$name_ct',
        ten_TL_khongdau = '$name_ct_no',
        ma_icon = '$id_icon'
        WHERE id_TL = $id_TL"
        );
        header("location: category-manage.php?page-active=category-manage");
    }
?>