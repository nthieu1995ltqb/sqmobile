<div class="aside">
    <ul class="aside_list">
        <li class="aside_item <?php if($_GET["page-active"] == "home") echo "active" ?>">
            <a href="index.php?page-active=home">
                <i class="fa fa-home"></i>Trang chủ Admin
            </a>
        </li>
        <li class="aside_item <?php if($_GET["page-active"] == "product-manage") echo "active" ?>">
            <a href="product-manage.php?page-active=product-manage&id_TL=1" class="product-btn">
                <i class="fa fa-mobile"></i>Sản phẩm
                <span class="fa fa-caret-down first"></span>
            </a>
            <ul class="aside_product_list product-show <?php if($_GET["page-active"] == "product-manage" && isset($_GET["id_TL"]) ) echo "show" ?>">
                <?php 
                    $fetchCategory = mysqli_query($mysqli,
                    "SELECT * FROM the_loai"
                    );
                    while($row = mysqli_fetch_array($fetchCategory)){
                ?>
                        <li class="aside_product_item <?php if($_GET['id_TL'] == $row['id_TL']) echo "sub_active" ?>">
                            <a href="product-manage.php?page-active=product-manage&id_TL=<?php echo $row['id_TL']?>"><?php echo $row['ten_TL']?></a>
                        </li>
                <?php } ?>
            </ul>
        </li>
        <li class="aside_item <?php if($_GET["page-active"] == "category-manage") echo "active" ?>">
            <a href="category-manage.php?page-active=category-manage">
                <i class="fa fa-folder-open-o"></i>Thể loại
            </a>
        </li>
        <li class="aside_item <?php if($_GET["page-active"] == "trademark-manage") echo "active" ?>">
            <a href="trademark-manage.php?page-active=trademark-manage">
                <i class="fa fa-building"></i>Thương hiệu
            </a>
        </li>
        <li class="aside_item"><a href="#"><i class="fa fa-newspaper-o"></i>Bài viết</a></li>
        <li class="aside_item"><a href="#"><i class="fa fa-adn"></i>Quảng cáo</a></li>
        <li class="aside_item"><a href="#"><i class="fa fa-user"></i>Người dùng</a></li>
    </ul>
</div>