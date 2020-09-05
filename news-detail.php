<?php
    session_start();
    include "lib/db-con.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQ Mobile - Tin tức</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
</head>
<body>
    <div class="wrapper">
    <?php
        include "blocks/header.php";
        include "blocks/main-menu.php";
    ?>
        <div class="container">
            <?php
                $id_TT = $_GET['id_TT'];
                $newsDetail = mysqli_query($mysqli, 
                "SELECT * FROM tin_tuc
                WHERE id_TT = $id_TT
                ");
                $row = mysqli_fetch_array($newsDetail);
            ?>
            <div class="news_detail">
                <div class="news_detail_title">
                    <h2><?php echo $row['tieu_de']?></h2>
                </div>
                <img src="imgs/tin-tuc/<?php echo $row['anh_thu_nho']?>" alt="">
                <div class="news_detail_content">
                    <?php echo $row['noi_dung']?>
                </div>
                <div class="related_news">
                    <h2>Có thể bạn muốn xem: </h2>
                    <div class="row">
                        <?php 
                            $relatedNews = mysqli_query($mysqli,
                            "SELECT * FROM tin_tuc 
                             WHERE id_TT <> $id_TT
                             ORDER BY RAND() LIMIT 0,3"
                             );
                             while($row_related = mysqli_fetch_array($relatedNews)){
                        ?>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <a href="news-detail.php?id_TT=<?php echo $row_related['id_TT'] ?>" class="related_news_item">
                                        <img src="imgs/tin-tuc/<?php echo $row_related['anh_thu_nho']?>" alt="">
                                        <h3><?php echo $row_related['tieu_de']?></h3>
                                    </a>
                                </div>
                            <?php } ?>
                    </div>
                </div>
        </div>
    </div>
    <?php
        include "blocks/footer.php";
    ?>
     <!-- Latest jQuery form server -->
     <script src='https://code.jquery.com/jquery.min.js'></script>
    <script type='text/javascript' src='js/main.js'></script>
</body>
</html>