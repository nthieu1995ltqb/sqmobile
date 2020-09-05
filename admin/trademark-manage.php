<?php
    ob_start();
    session_start();
    include "../lib/db-con.php";
    include "../lib/home-fn.php";
    include "fn/trademark-manage/trademark-fn.php";
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
                        <a href="#">Thương hiệu</a>
                    </div>
                </div>
                <div class="content_body">
                    <div class="row add_trademark">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 add_trademark_left">                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Tên không dấu</th>
                                        <th>Thể loại</th>
                                        <th>Ảnh</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($trademarkAll)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id_TH"]?></td>
                                        <td><?php echo $row["ten_TH"]?></td>
                                        <td><?php echo $row["ten_TH_khongdau"]?></td>
                                        <td>
                                            <?php 
                                                $fetchNameCt = mysqli_query($mysqli, "SELECT ten_TL FROM the_loai WHERE id_TL = $row[id_TL]");
                                                $row_TL = mysqli_fetch_array($fetchNameCt);
                                                echo $row_TL["ten_TL"];
                                            ?>
                                        </td>
                                        <td><img src="../imgs/thuong-hieu/<?php echo $row["img_TH"]?>" alt="<?php echo $row["ten_TH_khongdau"]?>"></td>
                                        <td class="action_pdt">
                                            <a href="trademark-manage.php?action=update&id_TH=<?php echo $row['id_TH'] ?>"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="trademark-manage.php?action=delete&id_TH=<?php echo $row['id_TH']?>" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>                            
                        </div>                        
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 add_trademark_right">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h3>Thêm mới:</h3>
                                <ul>
                                    <li> 
                                        <label for="name_ct">Tên thương hiệu: </label>
                                        <input type="text" class="form-control" name="name_tm" value="<?php if(isset($_GET["action"]) && $_GET["action"] == "update") echo $row_id["ten_TH"] ?>">
                                    </li>
                                    <li>
                                        <label for="id_icon">Thể loại: </label>
                                        <select name="category_tm" class="form-control">
                                            <?php 
                                                while($row_ct = mysqli_fetch_array($categoryMainMenu)){
                                            ?>
                                            <option value="<?php echo $row_ct["id_TL"] ?>" <?php if(isset($_GET["action"]) && $_GET["action"] == "update" && $row_ct["id_TL"] == $row_id["id_TL"]) echo "selected"; ?>><?php echo $row_ct["ten_TL"] ?></option>
                                                <?php } ?>
                                        </select>    
                                    </li>
                                    <li class="up_img">                                    
                                        <label for="">Ảnh: </label>                                       
                                        <input type="file" name="img_tm">
                                        <span><?php if(isset($error["img_tm"])) echo $error["img_tm"] ?></span>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn_add_tm" name="<?php if(isset($_GET["action"]) && $_GET["action"] == "update" ){ echo "update_trademark";} else { echo "add_trademark";} ?>">Thêm thể loại</button>
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