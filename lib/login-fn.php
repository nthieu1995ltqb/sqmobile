<?php
    //Đăng nhập chuyển hướng đến trang chủ
    if(isset($_POST["btn_login"])){
        $un_login = $_POST["user_name_login"];
        $pass_login = $_POST["password_login"];
        $pass_login = md5($pass_login);
        $qr = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap = '$un_login' AND mat_khau = '$pass_login'";
        $user = mysqli_query($mysqli, $qr);
        if(mysqli_num_rows($user) == 1){
            //đăng nhập đúng
            $row = mysqli_fetch_array($user);
            $_SESSION["id_ND"] = $row['id_ND'];
            $_SESSION["ten_ND"] = $row['ten_ND'];
            $_SESSION["ten_dang_nhap"] = $row['ten_dang_nhap'];
            $_SESSION["mat_khau"] = $row['mat_khau'];
            $_SESSION["phan_quyen"] = $row['phan_quyen'];
            $_SESSION["gioi_tinh"] = $row['gioi_tinh'];
            $_SESSION["dia_chi"] = $row['dia_chi'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["SDT"] = $row['SDT'];
        } else {
            $error_login = "Tên đăng nhập hoặc mật khẩu không chính xác";
        }
    }
?>