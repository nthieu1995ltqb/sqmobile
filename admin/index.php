<?php
    ob_start();
    session_start();
    include "../lib/db-con.php";
    include "../lib/home-fn.php";

    if( !isset($_SESSION["id_ND"])){
        header("location: ../index.php");
    } else if ($_SESSION["phan_quyen"] == 0 ){
        header("location: ../index.php");
    };
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
                        <a href="#">Trang chủ</a>
                    </div>
                </div>
                THIS IS HOME PAGE
            </div>
        </div>
    </div>
    </div>
</body>

</html>