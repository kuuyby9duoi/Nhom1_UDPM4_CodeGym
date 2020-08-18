 <?php

 $demsothich="";
  $file_dir  = "img/produc/";    
  if (isset($_POST["save"])) {
    foreach ($_FILES['pic']['name'] as $key => $value) {                   
     
      $file_name   = $_FILES['pic']['name'][$key];
      $file_tmp    = $_FILES['pic']['tmp_name'][$key];
 
      /* location file save */
      $file_target = $file_dir . $file_name; /* DIRECTORY_SEPARATOR = / or \ */
      if (move_uploaded_file($file_tmp, $file_target)) {                        
        echo "{$file_name} has been uploaded. <br />";                      
      } else {                      
        echo "Sorry, there was an error uploading {$file_name}.";                               
      }                 
 
    }               
  }

print_r($demsothich); 
?>









  foreach($_FILES['pic']["name"] as $i => $value) 
          {
            $url1 .=$value.",";}
          echo "$url1 <br>";
          $url=array($i => $url1);
          print_r($url);




          name='$name1',
category='$category1',
money='$price1',
old_price='$old_price1',
description='$description1',
in_stock='$in_stock1',
weight='$weight1',
size='$size1',
chat_lieu='$chat_lieu1',
xuatxu='$xuatxu1',
baohanh='$baohanh1',
ten_thuong_goi='$ten_thuong_goi1',
ten_khoa_hoc='$ten_khoa_hoc1',
ten_goi_khac='$ten_goi_khac1',
nguon_goc='$nguon_goc1',
dac_diem='$dac_diem1',
giao_hang='$giao_hang1',
ho='$ho1',
danh_gia='$danh_gia1',
max_mua='$max_mua1'





<?php 
require_once('connect.php');
 if(isset($_POST['save']))
{if(empty($_POST['name'])||empty($_POST['produc_id'])||empty($_POST['category'])||empty($_POST['money'])||empty($_POST['description'])||$_FILES['pic']["name"]==null) echo "Vui lòng nhập đầy đủ thông tin vào các trường";
     else {

      



        $file_name=$_FILES['pic']["name"];
        //lấy đường dẫn tạm lưu nội dung file:
        $file_tmp =$_FILES['pic']['tmp_name'];
        //tạo đường dẫn lưu file trên host:
        $path ="img/produc/".$file_name;
        //upload nội dung file từ đường dẫn tạm vào đường dẫn vừa tạo:
        move_uploaded_file($file_tmp,$path);
        //lấy thể loại file vào biến $type
        $type=$_FILES['pic']['type'];
      $add=mysqli_query($conn,"insert into sanpham values('".$_POST['name']."','".$_POST['produc_id']."','".$_POST['category']."','".$_POST['money']."','".$_POST['description']."','$path')");
      if ($add) echo "thành công";
      else echo"dell đc";
}
    }?>