<?php
    session_start();
    include 'lib/db-con.php';
    include 'lib/home-fn.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>SQ Mobile - Điện thoại chính hãng</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/main.css'>
    <link rel='stylesheet' href='css/slide.css'>
</head>

<body>
    <div class='wrapper'>
        <!-- menu top -->
        <?php
            include 'blocks/header.php';
        ?>
        <!-- end menu top -->

        <!-- main menu -->
        <?php
            include 'blocks/main-menu.php';
        ?>
        <!-- end main menu -->

        <div class='container'>
            <div id='content_area_ajax'>
                <?php
                    include 'pages/home.php';
                ?>
            </div>
        </div>
    </div>

    <?php
        include 'blocks/footer.php';
    ?>
    <!-- Latest jQuery form server -->
    <script src='https://code.jquery.com/jquery.min.js'></script>
    <!-- Slider -->
    <script type='text/javascript' src='js/bxslider.min.js'></script>
    <script type='text/javascript' src='js/script.slider.js'></script>
    <script type='text/javascript' src='js/main.js'></script>
</body>
</html>