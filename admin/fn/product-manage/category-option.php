<?php
    include "../../../lib/db-con.php";
    $id_TH = $_GET["id_TH"];
    $fetchTrademark = mysqli_query($mysqli, 
        "SELECT * FROM thuong_hieu WHERE id_TH = $id_TH"
    );

    $row = mysqli_fetch_array($fetchTrademark);
       
    $id_TL = $row["id_TL"];
    $fetchCategory = mysqli_query($mysqli,
        "SELECT * FROM the_loai WHERE id_TL = $id_TL"
    );
    while($row_category = mysqli_fetch_array($fetchCategory)){
?>
        <option value="<?php echo $row_category["id_TL"] ?>"><?php echo $row_category["ten_TL"] ?></option>
    <?php } ?>
