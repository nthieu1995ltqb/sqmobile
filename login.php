<?php
    session_start();
    require "lib/db-con.php";
    require "lib/login-fn.php";
    require "lib/home-fn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQ Mobile - Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header_register_login">
                <div class="header_inner_left">
                    <a href="index.php" class="header_logo"><img src="imgs/logo.png" alt="logo"></a>
                </div>
                <div class="btn_back">
                    <a href="javascript:history.go(-1)"><span class="fa fa-long-arrow-left"></span>  Quay lại</a>
                </div>
            </div>
        </div>
    </header>
    <?php           
        //Chặn người dùng vào trang đăng nhập khi đã đăng nhập
        if(isset($_SESSION['id_ND'])){
            header('location: index.php');
        } else {
        ?>
            <form action="" method="post">
                <div class="form_login">
                    <h3>Đăng nhập</h3>
                    <label for="user_name_login">Tên tài khoản:</label>
                    <input type="text" class="form-control" name="user_name_login">
                    <label for="password_login">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password_login">
                    <input type="submit" name="btn_login" class="btn" value="Đăng nhập">
                    <span><?php if(isset($error_login)) echo $error_login ?></span>
                    <div class="forgot_pass">
                        <a href="#">Quên mật khẩu</a>
                        <a href="register.php">Chưa có tài khoản? <span>Đăng ký</span></a>
                    </div>
                </div>               
            </form>
        <?php } ?>
        <div class="footer_copy"><span>&copy; 2020 Design by Trung Hieu. All rights reserved</span></div>
</body>
</html>