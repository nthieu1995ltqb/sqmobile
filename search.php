<?php
    include "lib/db-con.php";
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
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
            <ul class="product_list"> 
                <?php
                    $tu_khoa = $_GET['search'];
                    $searchProduct = mysqli_query($mysqli,
                        "SELECT * FROM chitietsanpham 
                        WHERE ten_SP REGEXP '$tu_khoa'
                        ORDER BY id_SP DESC"
                    );
                    if(mysqli_num_rows($searchProduct) == 0){
                        echo "Không có kết quả tìm kiếm !";
                    } else {
                    while($row = mysqli_fetch_array($searchProduct))
                    {
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
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php
            //Thêm footer     
            include "blocks/footer.php";     
        ?> 
     </div>
 </body>
 </html>