<?php 
     session_start();
     require "lib/db-con.php";
     require "lib/home-fn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQ Mobile - Sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
</head>

<body>
    <div class="wrapper">
        <?php
            //Thêm header & menu        
            include "blocks/header.php";       
            include "blocks/main-menu.php";   
        ?>
        <div class="container">           
            <div class="product">
                <?php
                    include "blocks/menu-trademark.php";
                ?>
                <ul class="product_list">    
                    <?php
                        if(isset($_GET["id_TL"]) && !isset($_GET["id_TH"])){
                            $id_TL = $_GET["id_TL"];
                            $productsByCategory = mysqli_query($mysqli,
                            "SELECT * FROM chitietsanpham WHERE id_TL = '$id_TL'"
                            );
                        } else if(isset($_GET["id_TH"])) {
                            $id_TL = $_GET["id_TL"];
                            $id_TH = $_GET["id_TH"];
                            $productsByCategory = mysqli_query($mysqli,
                            "SELECT * FROM chitietsanpham WHERE id_TL = '$id_TL'
                            AND id_TH = '$id_TH'"
                            );
                        } else {
                            $productsByCategory = mysqli_query($mysqli,
                            "SELECT * FROM chitietsanpham"
                            );
                        }
                        while($row = mysqli_fetch_array($productsByCategory)){
                            $gia = $row['gia_SP'] - $row['khuyen_mai'];
                    ?>             
                        <li class="product_item">
                            <a href="product-detail.php?id_SP=<?php echo $row["id_SP"]?>">
                            <div class="product_img">
                                <img src="imgs/img-sp/<?php echo $row['img_SP_1']?>" alt="">
                                <span class="installment" >Trả góp 0%</span>
                            </div>
                                <h3 class="product_title"><?php echo $row['ten_SP']?></h3>
                                <p class="product_price"><?php echo number_format($gia, 0,'.', '.')?>₫
                                <span><?php echo number_format($row['gia_SP'], 0,'.', '.')?>₫</span></p>
                                <p class="product_description">Tặng 2 suất mua đồng hồ thời trang giảm 40%</p>
                            </a>
                        </li>
                        <?php } ?>                  
                </ul>
        </div>  
    </div>    
        <?php
            //Thêm footer     
            include "blocks/footer.php";     
        ?> 
        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script> 
</body>

</html>