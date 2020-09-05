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
            <div class="news">
                <ul class="news_list">
                <?php
                    $fetchAllNews = mysqli_query($mysqli, 
                    "SELECT * FROM tin_tuc
                    ");
                    
                    while($row = mysqli_fetch_array($fetchAllNews)){
                ?>
                    <li>
                        <a href="news-detail.php?id_TT=<?php echo $row['id_TT']?>"  class="news_item">
                            <img src="imgs/tin-tuc/<?php echo $row['anh_thu_nho']?>" alt="">
                            <div class="news_desc">
                                <h3><?php echo $row['tieu_de']?></h3>
                                <p><?php echo $row['noi_dung']?></p>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                </div>
            </div>
        </div>
    <?php
        include "blocks/footer.php";
        ?>
    </div>
     <!-- Latest jQuery form server -->
     <script src='https://code.jquery.com/jquery.min.js'></script>
    <!-- Slider -->
    <script type='text/javascript' src='js/bxslider.min.js'></script>
    <script type='text/javascript' src='js/script.slider.js'></script>
    <script type='text/javascript' src='js/main.js'></script>
</body>
</html>

