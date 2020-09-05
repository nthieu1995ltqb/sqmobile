<?php
    include "lib/db-con.php";

    
    $id_TL = $_GET["id_TL"];
    $id_TH = $_GET["id_TH"];
    $productClassification = mysqli_query($msqli,
    "SELECT chitietsp_mobile
    WHERE id_TL = $id_TL AND id_TH = $id_TH
    ORDER BY id_SP DESC
    LIMIT 0, 10
    ");
  
     while($row = mysqli_fetch_array($productClassification))
     {
         $gia = $row['gia_SP'] - $row['khuyen_mai'];
 ?>
     <li class="product_item">
         <a href="product-detail.php?id_SP=<?php echo $row["id_SP"]?>">
             <img src="imgs/img-sp/<?php echo $row['img_SP_1']?>" alt="" class="product_img">
             <h3 class="product_title"><?php echo $row['ten_SP']?></h3>
             <p class="product_price"><?php echo number_format($gia, 0,'.', '.')?>₫
             <span><?php echo  number_format($row['gia_SP'], 0,'.', '.')?>₫</span></p>
             <p class="product_description">Tặng 2 suất mua đồng hồ thời trang giảm 40%</p>
         </a>
     </li>
 <?php
     }
 ?>
