<?php
    include "validation_form_register.php";

    if(empty($error) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $password = md5($password);
        $registerUser = mysqli_query($mysqli, 
        "   INSERT INTO nguoi_dung (ten_ND, ten_dang_nhap, gioi_tinh, mat_khau, email, dia_chi, SDT)
            VALUE ('$name', '$user_name', '$gender', '$password', '$email', '$address', '$number_phone')
        ");
     
    if(!$registerUser){
        if(strpos(mysqli_error($mysqli), "Duplicate entry") !== false){
            $error["user_name"] = "Tài khoản đã tồn tại. Vui lòng chọn tài khoản khác";
        }
    } else {
        ?>
        <div class="label-success">Đăng ký thành công</div>
        <a href="login.php">Đăng nhập ngay!</a>   
<?php
    } 
} 
?>

