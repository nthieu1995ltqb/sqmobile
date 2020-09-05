<?php
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $error = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $gender = $_POST["gender"];

        if(empty($_POST["name"])){
            $error["name"] = "Tên bắt buộc";
        } else {
            $name = test_input($_POST["name"]);
        }

        if(empty($_POST["user_name"])){
            $error["user_name"] = "Tên tài khoản bắt buộc";
        } else {
            $user_name = test_input($_POST["user_name"]);
        }

        if(empty($_POST["password"])){
            $error["password"] = "Mật khẩu bắt buộc";
        } else {
            $password = test_input($_POST["password"]);
            if(strlen($password) < 6){
                $error["password"] = "Mật khẩu chứa ít nhất 6 ký tự";
            }
        }

        if(empty($_POST["re_password"])){
            $error["re_password"] = "Nhập lại mật khẩu bắt buộc";
        } else {
            $re_password = test_input($_POST["re_password"]);
            if($re_password != $password){
                $error["re_password"] = "Mật khẩu không giống mật khẩu đã chọn";
            }
        }

        if(empty($_POST["email"])){
            $error["email"] = "Email bắt buộc";
        } else {
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error["email"] = "Email không đúng định dạng";
            }        
        }

        if(empty($_POST["address"])){
            $error["address"] = "Địa chỉ bắt buộc";
        } else {
            $address = test_input($_POST["address"]);
        }

        if(empty($_POST["number_phone"])){
            $error["number_phone"] = "Số điện thoại bắt buộc";
        } else {
            $number_phone = test_input($_POST["number_phone"]);
            $pattern =" /\d{10}/";
            if(!preg_match($pattern , $number_phone)){
                $error["number_phone"] = "Sai định dạng";
            }
        }
    } 
?>