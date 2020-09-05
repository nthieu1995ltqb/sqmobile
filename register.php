<?php
        session_start();
        require "lib/db-con.php";
        require "lib/home-fn.php";
        include "lib/register-fn.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
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

<form action="register.php" method="post">
        <ul class="register_list">
            <h3>SQ Mobile - Đăng ký tài khoản</h3>
            <li class="register_item">
                <label for="name">Tên khách hàng <span>*</span></label>
                <input type="text" class="form-control" name="name" value="<?php if(isset($name)) echo $name; ?>">
                <?php if(isset($error["name"])) { ?>
                    <span class="mess_error"><?php echo $error["name"] ?></span>
                <?php } ?>
            </li>
            <li class="register_item">
                <label for="gender">Giới tính <span>*</span></label>
                <select name="gender" class="form-control">
                    <option value="0" <?php if(isset($gender) && $gender == 0) echo "selected" ?>>Nam</option>
                    <option value="1" <?php if(isset($gender) && $gender == 1) echo "selected" ?>>Nữ</option>
                    <option value="2" <?php if(isset($gender) && $gender == 2) echo "selected" ?>>Không xác định</option>
                </select>
            </li>
            <li class="register_item">
                <label for="user_name">Tên tài khoản <span>*</span></label>
                <input type="text" class="form-control" name="user_name" value="<?php if(isset($user_name)) echo $user_name; ?>">
                <?php if(isset($error["user_name"])) { ?>
                    <span class="mess_error"><?php echo $error["user_name"] ?></span>
                <?php } ?>
            </li>
            <li class="register_item">
                <label for="password">Mật khẩu <span>*</span></label>
                <input type="password" class="form-control" name="password" value="<?php if(isset($password)) echo $password; ?>">
                <?php if(isset($error["password"])) { ?>
                    <span class="mess_error"><?php echo $error["password"] ?></span>
                <?php } ?>
            </li>
            <li class="register_item">
                <label for="re_password">Nhập lại mật khẩu <span>*</span></label>
                <input type="password" class="form-control" name="re_password" value="<?php if(isset($re_password)) echo $re_password; ?>">
                <?php if(isset($error["re_password"])) { ?>
                    <span class="mess_error"><?php echo $error["re_password"] ?></span>
                <?php } ?>
            </li>
            <li class="register_item">
                <label for="email">Email <span>*</span></label>
                <input type="text" class="form-control" name="email" value="<?php if(isset($email)) echo $email; ?>">
                    <?php if(isset($error["email"])) { ?>
                        <span class="mess_error"><?php echo $error["email"] ?></span>
                    <?php } ?> 
            </li>
            <li class="register_item">
                <label for="address">Địa chỉ <span>*</span></label>
                <input type="text" class="form-control" name="address" value="<?php if(isset($address)) echo $address; ?>">
                    <?php if(isset($error["address"])) { ?>
                        <span class="mess_error"><?php echo $error["address"] ?></span>
                    <?php } ?> 
            </li>
            <li class="register_item">
                <label for="number_phone">Số điện thoại <span>*</span></label>
                <input type="text" class="form-control" name="number_phone" value="<?php if(isset($number_phone)) echo $number_phone; ?>">
                    <?php if(isset($error["number_phone"])) { ?>
                        <span class="mess_error"><?php echo $error["number_phone"] ?></span>
                    <?php } ?> 
            </li>
            <li class="register_item">
                <input type="submit" class="btn" value="Đăng ký tài khoản">
            </li>
        </ul>
        </form>
        <div class="footer_copy"><span>&copy; 2020 Design by Trung Hieu. All rights reserved</span></div>
    </div>
</body>
</html>