<ul class="product_list">
        <?php
            while($row = mysqli_fetch_array($mobileMostView))
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
        ?>
        