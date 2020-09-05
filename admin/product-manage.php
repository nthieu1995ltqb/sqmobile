<?php
    ob_start();
    session_start();
    include "../lib/db-con.php";
    include "../lib/home-fn.php"
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
                        <a href="#">Trang chủ</a><i class="fa fa-angle-right"></i><a href="#">Sản phẩm</a>
                    </div>
                    <div class="add_new_product"><a href="add-product.php?id_TL=<?php echo $_GET["id_TL"] ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</a></div>
                </div>
                <div class="pagination">
                    <ul class="pagination_list">
                        <?php
                            //Xóa sản phẩm
                            if(isset($_GET["action"]) && $_GET["action"] == 'delete'){
                                $id_SP = $_GET["id_SP"];
                                $deleteProduct = mysqli_query($mysqli,
                                "DELETE FROM chitietsanpham WHERE id_SP = $id_SP"
                            );
                            header("location: product-manage.php");
                            }

                            //Số tin 1 trang hiển thị
                             $last = 7;

                            if(isset($_GET['id_TL'])){
                                $id_TL = $_GET['id_TL'];
                            } else {
                                $id_TL = 1;
                            }
                            $fetchProductByCategory = mysqli_query($mysqli,
                            "SELECT * FROM chitietsanpham
                            WHERE id_TL = $id_TL"
                            );
                            $numberProduct = mysqli_num_rows($fetchProductByCategory);
                            $numberPage = ceil($numberProduct/$last);
                            for($i=1; $i <= $numberPage; $i++){
                        ?>
                                <li class="pagination_item">
                                    <a href="product-manage.php?id_TL=<?php echo $id_TL?>&page=<?php echo $i?>">
                                        <?php echo $i ?>
                                    </a>
                                </li>
                            <?php } ?>
                    </ul>
                </div>
                <div class="content_body">
                    <div class="display_product">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-2">Tên</th>
                                <th class="col-3">Giá</th>
                                <th class="col-4">Tình trạng</th>
                                <th class="col-5">Đánh giá</th>
                                <th class="col-6">Ảnh</th>
                                <th class="col-7">Thông số kĩ thuật</th>
                                <th class="col-8">Lượt xem</th>
                                <th class="col-9">Tác vụ</th>
                            </tr>
                        </thead>
                            <tbody>
                                 <?php
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    $first = ($page - 1) * $last;
                                    $fetchProductByPage = mysqli_query($mysqli,
                                    "SELECT * FROM chitietsanpham
                                    WHERE id_TL = $id_TL
                                    ORDER BY id_SP DESC
                                    LIMIT $first, $last"
                                    );
                                    while($row = mysqli_fetch_array($fetchProductByPage)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_SP']?></td>
                                    <td><?php echo $row['ten_SP']?></td>
                                    <td><?php echo $row['gia_SP']?><br/>Giảm giá: <?php echo $row['khuyen_mai']?></td>
                                    <td>
                                        <?php 
                                            if($row['tinh_trang'] = 1){
                                                echo 'Còn hàng';
                                            } else {
                                                echo 'Hết hàng';
                                            }                                     
                                        ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-star <?php if($row["danh_gia"] >= 1) echo 'star_active'; ?>"></i>
                                        <i class="fa fa-star <?php if($row["danh_gia"] >= 2) echo 'star_active'; ?>"></i>
                                        <i class="fa fa-star <?php if($row["danh_gia"] >= 3) echo 'star_active'; ?>"></i>
                                        <i class="fa fa-star <?php if($row["danh_gia"] >= 4) echo 'star_active'; ?>"></i>
                                        <i class="fa fa-star <?php if($row["danh_gia"] >= 5) echo 'star_active'; ?>"></i>
                                    </td>
                                    <td>
                                        <img src="../imgs/img-sp/<?php echo $row['img_SP_1']?>" alt="">
                                    </td>
                                    <td class="product_info">
                                        <ul class="product_info_list">
                                            <li class="product_info_item">- Màn hình: <?php echo $row['man_hinh']?></li>
                                            <li class="product_info_item">- Hệ điều hành: <?php echo $row['HDH']?></li>
                                            <?php switch($_GET["id_TL"]){
                                                case 1:
                                            ?>
                                                <li class="product_info_item">- Camera trước: <?php echo $row['camera_truoc']?></li>
                                                <li class="product_info_item">- Camera sau: <?php echo $row['camera_sau']?></li>
                                                <li class="product_info_item">- Bộ nhớ trong: <?php echo $row['bo_nho_trong']?></li>
                                                <li class="product_info_item">- PIN: <?php echo $row['PIN']?></li>
                                            <?php 
                                                break;
                                                case 2: 
                                            ?>
                                                <li class="product_info_item">- Ổ cứng: <?php echo $row['o_cung']?></li>
                                                <li class="product_info_item">- CPU: <?php echo $row['CPU']?></li>
                                                <li class="product_info_item">- Card màh hình: <?php echo $row['card_man_hinh']?></li>
                                                <li class="product_info_item">- Kích thước: <?php echo $row['kich_thuoc']?></li>
                                            <?php 
                                                break;
                                                } 
                                            ?>                                            
                                            <li class="product_info_item">- RAM: <?php echo $row['RAM']?></li>                                                                                      
                                        </ul>
                                    </td>
                                    <td><?php echo $row['luot_xem']?></td>
                                    <td class="action_pdt">
                                        <a href="add-product.php?action=update&id_TL=<?php echo $row['id_TL'] ?>&id_SP=<?php echo $row['id_SP']?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="product-manage.php?action=delete&id_SP=<?php echo $row['id_SP']?>" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                    <?php } ?>
                        
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>