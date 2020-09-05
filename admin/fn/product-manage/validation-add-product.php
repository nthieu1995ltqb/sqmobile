<?php

    function test_input_pdt($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if(isset($_POST["add_product"])){

        $error = array();

        $name_pdt = $_POST["name_pdt"];
        $status_pdt = $_POST["status_pdt"];
        $price_pdt = $_POST["price_pdt"];
        $discount_pdt = $_POST["discount_pdt"];
        $trademark_pdt = $_POST["trademark_pdt"];
        $category_pdt = $_POST["category_pdt"];
        $screen_pdt = $_POST["screen_pdt"];
        $system_pdt = $_POST["system_pdt"];
        $ram_pdt = $_POST["ram_pdt"];
        switch($_GET["id_TL"]){
            case 1:
                $rear_camera_pdt = $_POST["rear_camera_pdt"];
                $front_camera_pdt = $_POST["front_camera_pdt"];
                $memory_pdt = $_POST["memory_pdt"];
                $pin_pdt = $_POST["pin_pdt"];

                if(empty($rear_camera_pdt)){
                    $error["rear_camera_pdt"] = "Thêm camera sau";
                } else {
                    $rear_camera_pdt = test_input_pdt($rear_camera_pdt);
                }
        
        
                if(empty($front_camera_pdt)){
                    $error["front_camera_pdt"] = "Thêm camera trước";
                } else {
                    $front_camera_pdt = test_input_pdt($front_camera_pdt);
                }
        
        
                if(empty($memory_pdt)){
                    $error["memory_pdt"] = "Thêm bộ nhớ trong";
                } else {
                    $memory_pdt = test_input_pdt($memory_pdt);
                }
        
        
                if(empty($pin_pdt)){
                    $error["pin_pdt"] = "Thêm PIN";
                } else {
                    $pin_pdt = test_input_pdt($pin_pdt);
                }

                break;
            case 2: 
                $hard_drive_pdt = $_POST["hard_drive_pdt"];
                $graphic_card_pdt = $_POST["graphic_card_pdt"];
                $size_pdt = $_POST["size_pdt"];
                $cpu_pdt = $_POST["cpu_pdt"];

                if(empty($hard_drive_pdt)){
                    $error["hard_drive_pdt"] = "Thêm ổ cứng";
                } else {
                    $hard_drive_pdt = test_input_pdt($hard_drive_pdt);
                }
        
        
                if(empty($graphic_card_pdt)){
                    $error["graphic_card_pdt"] = "Thêm card màn hình";
                } else {
                    $graphic_card_pdt = test_input_pdt($graphic_card_pdt);
                }
        
        
                if(empty($CPU)){
                    $error["CPU"] = "Thêm CPU";
                } else {
                    $CPU = test_input_pdt($CPU);
                }
        
                
                if(empty($size_pdt)){
                    $error["size_pdt"] = "Thêm kích thước";
                } else {
                    $size_pdt = test_input_pdt($size_pdt);
                }
            break;
        }


        if(empty($name_pdt)){
            $error["name_pdt"] = "Thêm tên sản phẩm";
        } else {
            $name_pdt = test_input_pdt($name_pdt);
        }


        if(empty($price_pdt)){
            $error["price_pdt"] = "Thêm giá sản phẩm";
        } else {
            $price_pdt = test_input_pdt($price_pdt);
        }


        if(empty($discount_pdt)){
            $error["discount_pdt"] = "Thêm khuyến mãi";
        } else {
            $discount_pdt = test_input_pdt($discount_pdt);
        }


        if(empty($screen_pdt)){
            $error["screen_pdt"] = "Thêm màn hình";
        } else {
            $screen_pdt = test_input_pdt($screen_pdt);
        }


        if(empty($system_pdt)){
            $error["system_pdt"] = "Thêm hệ điều hành";
        } else {
            $system_pdt = test_input_pdt($system_pdt);
        }


        if(empty($ram_pdt)){
            $error["ram_pdt"] = "Thêm RAM";
        } else {
            $ram_pdt = test_input_pdt($ram_pdt);
        }





         //Ảnh 1
         $file = $_FILES['img_1_upload'];
          $fileName1 = $_FILES['img_1_upload']['name'];
          $fileTmpName1 = $_FILES['img_1_upload']['tmp_name'];
          $fileSize1 = $_FILES['img_1_upload']['size'];
          $fileError1 = $_FILES['img_1_upload']['error'];
          $fileType1 = $_FILES['img_1_upload']['type'];
          $fileExt1 = explode('.', $fileName1);
          $fileActualExt1 = strtolower(end($fileExt1));
  
          $allowed1 = array( 'jpg', 'jpeg', 'png');
  
          if(in_array( $fileActualExt1, $allowed1)){
              if($fileError1 === 0){
                  if($fileSize1 < 1000000){
                      // $fileNameNew1 = uniqid('',true).'.'.$fileActualExt1;
                      $fileDest1 = 'imgs/'.$fileName1;
                      move_uploaded_file($fileTmpName1, $fileDest1);
                      header('loacation: add-product.php?uploadsuccess');
                  }else {
                      $error["img_1_upload"] = 'Ảnh tải lên quá lớn';
                  }
              } else {
                $error["img_1_upload"] = 'Ảnh tải lên bị lỗi';
              }
          } else {
            $error["img_1_upload"] = 'Ảnh tải lên phải đúng định dạng jpg hoặc png';
          }

      //Ảnh 2
          $file = $_FILES['img_2_upload'];
          $fileName2 = $_FILES['img_2_upload']['name'];
          $fileTmpName2 = $_FILES['img_2_upload']['tmp_name'];
          $fileSize2 = $_FILES['img_2_upload']['size'];
          $fileError2 = $_FILES['img_2_upload']['error'];
          $fileType2 = $_FILES['img_2_upload']['type'];
          $fileExt2 = explode('.', $fileName2);
          $fileActualExt2 = strtolower(end($fileExt2));
  
          $allowed2 = array( 'jpg', 'jpeg', 'png');
  
          if(in_array( $fileActualExt2, $allowed2)){
              if($fileError2 === 0){
                  if($fileSize2 < 1000000){
                      $fileDest2 = 'imgs/'.$fileName2;
                      move_uploaded_file($fileTmpName2, $fileDest2);
                      header('loacation: add-product.php?uploadsuccess');
                  }else {
                       $error["img_2_upload"] = 'Ảnh tải lên quá lớn';
                  }
              } else {
                   $error["img_2_upload"] = 'Ảnh tải lên bị lỗi';
              }
          } else {
               $error["img_2_upload"] = 'Ảnh tải lên phải đúng định dạng jpg hoặc png';
          }

      //Ảnh 3
          $fileName3 = $_FILES['img_3_upload']['name'];
          $fileTmpName3 = $_FILES['img_3_upload']['tmp_name'];
          $fileSize3 = $_FILES['img_3_upload']['size'];
          $fileError3 = $_FILES['img_3_upload']['error'];
          $fileType3 = $_FILES['img_3_upload']['type'];
          $fileExt3 = explode('.', $fileName3);
          $fileActualExt3 = strtolower(end($fileExt3));
  
          $allowed3 = array( 'jpg', 'jpeg', 'png');
  
          if(in_array( $fileActualExt3, $allowed3)){
              if($fileError3 === 0){
                  if($fileSize3 < 1000000){
                      $fileDest3 = 'imgs/'.$fileName3;
                      move_uploaded_file($fileTmpName3, $fileDest3);
                      header('loacation: add-product.php?uploadsuccess');
                  }else {
                       $error["img_3_upload"] = 'Ảnh tải lên quá lớn';
                  }
              } else {
                   $error["img_3_upload"] = 'Ảnh tải lên bị lỗi';
              }
          } else {
               $error["img_3_upload"] = 'Ảnh tải lên phải đúng định dạng jpg hoặc png';
          }

      //Ảnh 4
          $fileName4 = $_FILES['img_4_upload']['name'];
          $fileTmpName4 = $_FILES['img_4_upload']['tmp_name'];
          $fileSize4 = $_FILES['img_4_upload']['size'];
          $fileError4 = $_FILES['img_4_upload']['error'];
          $fileType4 = $_FILES['img_4_upload']['type'];
          $fileExt4 = explode('.', $fileName4);
          $fileActualExt4 = strtolower(end($fileExt4));
  
          $allowed4 = array( 'jpg', 'jpeg', 'png');
  
          if(in_array( $fileActualExt4, $allowed4)){
              if($fileError4 === 0){
                  if($fileSize4 < 1000000){
                      $fileDest4 = 'imgs/'.$fileName4;
                      move_uploaded_file($fileTmpName4, $fileDest4);
                      header('loacation: add-product.php?uploadsuccess');
                  } else {
                       $error["img_4_upload"] = 'Ảnh tải lên quá lớn';
                  }
              } else {
                   $error["img_4_upload"] = 'Ảnh tải lên bị lỗi';
              }
          } else {
               $error["img_4_upload"] = 'Ảnh tải lên phải đúng định dạng jpg hoặc png';
          }
    } 

?>
