<?php
    ob_start();
    session_start();
    include "../lib/db-con.php";
    include "../lib/home-fn.php";
    include "fn/category-manage/category-fn.php";
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
                        <a href="index.php?page-active=home">Trang chủ</a>
                        <i class="fa fa-angle-right"></i>
                        <a href="#">Thể loại</a>
                    </div>
                </div>
                <div class="content_body">
                    <div class="row add_category">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 add_category_left">                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Tên không dấu</th>
                                        <th>Mã icon</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($categoryMainMenu)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id_TL"]?></td>
                                        <td><?php echo $row["ten_TL"]?></td>
                                        <td><?php echo $row["ten_TL_khongdau"]?></td>
                                        <td><?php echo $row["ma_icon"]?></td>
                                        <td class="action_pdt">
                                            <a href="category-manage.php?action=update&id_TL=<?php echo $row['id_TL'] ?>"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="category-manage.php?action=delete&id_TL=<?php echo $row['id_TL']?>" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>                            
                        </div>                        
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 add_category_right">
                            <form action="" method="POST">
                                <h3>Thêm mới:</h3>
                                <ul>
                                    <li>
                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="name_ct">Tên thể loại: </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="name_ct" value="<?php if(isset($_GET["action"]) && $_GET["action"] == "update") echo $row_id["ten_TL"] ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="id_icon">Mã icon: </label>
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Ex: fa-home" class="form-control" name="id_icon" value="<?php if(isset($_GET["action"]) && $_GET["action"] == "update") echo $row_id["ma_icon"] ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn_add_ct" name="<?php if(isset($_GET["action"]) && $_GET["action"] == "update" ){ echo "update_category";} else { echo "add_category";} ?>">Thêm thể loại</button>
                                    </li>
                                </ul>
                            </form>
                        </div>                       
                    </div>    
                </div>
        </div>
    </div>

</body>

</html>