<?php  
    $newsLatest = mysqli_query($mysqli, "SELECT * FROM tin_tuc ORDER BY id_TT DESC LIMIT 0,3");

    // $fetchAllProduct = mysqli_query($mysqli,
    // "SELECT * FROM chitietsanpham"
    // );
    
    //Top 10 sản phẩm mới nhất
    $productLatest = mysqli_query($mysqli, 
        "SELECT * FROM chitietsanpham 
        ORDER BY id_SP DESC 
        LIMIT 0,10"
    );

    //Top 5 sản phẩm xem nhiều nhất
    $mobileMostView = mysqli_query($mysqli,
        "SELECT * FROM chitietsanpham
        WHERE id_TL = '1'
        ORDER BY luot_xem DESC
        LIMIT 0,5"
    );
    
    $laptopMostView = mysqli_query($mysqli,
        "SELECT * FROM chitietsanpham
        WHERE id_TL = '2'
        ORDER BY luot_xem DESC
        LIMIT 0,5"
    );
    //Lấy danh sách menu chính
    $categoryMainMenu = mysqli_query($mysqli, "SELECT * FROM the_loai");
    
    //Lấy danh sách thương hiệu
    $trademarkAll = mysqli_query($mysqli, "SELECT * FROM thuong_hieu");
?>