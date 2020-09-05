<figure class="block_new_header">
    <a href="news.php" class="block_new_title">Tin Công Nghệ</a>
</figure>
<?php
    while($row = mysqli_fetch_array($newsLatest))
    {
?>
    <a href="news-detail.php?id_TT=<?php echo $row['id_TT']?>" class="block_new_box">
        <img src="imgs/tin-tuc/<?php echo ($row["anh_thu_nho"])?>" alt="" class="block_new_img">
        <p class="block_new_desc"><?php echo ($row["tieu_de"])?></p>
    </a>
<?php
    }
?>

