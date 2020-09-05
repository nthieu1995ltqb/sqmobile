
<div class="main_menu">
    <nav class="container">
        <ul class="main_menu_list">
        <?php
            $categoryMainMenu = mysqli_query($mysqli,
            "SELECT * FROM the_loai"
        );
            while($row = mysqli_fetch_array($categoryMainMenu))
            {
        ?>  
            <li class="main_menu_item <?php if($row["id_TL"]==$_GET["id_TL"]){echo'main_menu_active';}?>">
                <a href="products.php?id_TL=<?php echo $row["id_TL"]?>">
                 <i class="fa <?php echo $row["ma_icon"]?>">
                </i><?php echo $row["ten_TL"]?>
                </a>
            </li>
        <?php } ?>
        </ul>
    </nav>
</div>

