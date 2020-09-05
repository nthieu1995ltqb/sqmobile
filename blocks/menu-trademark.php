<div class="menu_trademark">
    <ul class="menu_trademark_list">
        <?php
            //Lấy danh sách menu thương hiệu
            if(isset($_GET['id_TL'])){
                $id_TL = $_GET['id_TL'];
            } else {
                $id_TL = 1;
            }
            $categoryTradeMark = mysqli_query($mysqli, 
            "SELECT * FROM thuong_hieu
            WHERE id_TL = $id_TL"
        );
            while($row = mysqli_fetch_array($categoryTradeMark)){
        ?>
        <li class="menu_trademark_item  <?php if($row["id_TH"] == $_GET["id_TH"]) echo 'menu_trademark_active';?>">
            <a href="products.php?id_TL=<?php echo $row["id_TL"]?>&id_TH=<?php echo $row["id_TH"]?>" class="menu_trademark_img <?php if($row["id_TH"] == $_GET["id_TH"]) echo 'img_active';?>">
                <img src="imgs/thuong-hieu/<?php echo $row['img_TH']?>" alt="<?php echo $row['ten_TH_khongdau']?>">
            </a>
        </li>
        <?php } ?>
    </ul>
</div>
