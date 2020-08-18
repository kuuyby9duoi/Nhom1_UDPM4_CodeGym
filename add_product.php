<?php 
 include('header.php');ob_start(); 
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Thêm sản phẩm</title>
<style type="text/css">
.all2 {width:auto;height:auto;max-width: 750px; max-height: 600px; background-color: #79797985; margin: auto; font-family: arial;margin-top: 100px;border-radius: 15px;color: #ffffffc2;}
.text1 {padding-top:20px; margin:auto; text-align:center;  font-weight:bold;color: #000;}
.text2 {height: 15px; color:#000000; margin-top:10px; width:250px; float:left; padding-left:10px;font-weight: bold; line-height: 25px;}
.inputtext {width: 300px;  margin-top: 10px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 35px;padding-left: 15px;margin-left:10px;}
.radio {width:15px; height:20px; margin-top:7px; margin-left: 30px; vertical-align: bottom;}
#button {text-align:center;  margin-top:15px;}
.button {width: 100px; height: 40px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 20px; transition: transform .2s;}
.button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
select {width:300px; height:20px; margin-top:10px; border: #80d894d6 1px solid; border-radius: 20px;padding-left: 8px; height: 25px;margin-left:10px;}
option {color: #fff;background-color: #cc6f4d73;}
option:hover {color: #000;background-color: #80d894d6;}
.noti {height: 15px;width: 800px; height: 80px; color:#ff0201bd;margin-left: 45px; margin-top:10px;padding-left:10px; line-height: 25px;border-radius: 20px;}
.change_avata { color:#04771ed6; cursor: pointer;display: inline-block;width: 300px; height: 40px; margin-top: 20px; border: #80d894d6 1px solid; border-radius: 20px; padding-top: 5px; padding-left: 15px; background-color: #fff;margin-left:10px;}
</style>
</head>
<body style="background-image: url(img/background.png);background-repeat: no-repeat;">
<div class="all2">
<form method="POST" enctype="multipart/form-data">
            <div class="text1">Thêm mới sản phẩm</div>
            <div class="text2">Tên Sản Phẩm:</div>
            <div><input type="text" name="name" class="inputtext" placeholder="Sen Đá Kim Cương"></div>
            <div class="text2">Mã Sản Phẩm:</div>
            <div><input type="text" name="produc_id" class="inputtext" placeholder="465"></div>
            <div class="text2">Danh Mục:</div>
            <div> <select name="category" class="quequan" title="chọn danh mục sản phẩm">
                        <option value="Cây trong nhà" selected>Cây trong nhà</option>
                        <option value="Cây ngoài trời">Cây ngoài trời</option>
                        <option value="Cây để bàn">Cây để bàn</option>
                        <option value="Cây mini">Cây mini</option>
                        <option value="Cây thủy canh">Cây thủy canh</option>
                        <option value="Cây công trình">Cây công trình</option>
                        <option value="Phân bón">Phân bón</option>
                        <option value="Chậu">Chậu</option>
                  </select></div>
            <div class="text2">Giá:</div>
            <div><input type="number" name="money" class="inputtext" placeholder="60000"></div>
            <div class="text2">Mô tả sản phẩm:</div>
            <div><textarea name="description" class="inputtext" placeholder="Cây sen đá là một loài cây..."></textarea></div>
            <div class="text2">Picture:</div>
            <div class="change_avata"><input type="file" name="pic[]" multiple accept=".jpg, .jpeg, .png"></div>
            <div id="button">
                 <button class="button" type="submit" name="save" value="save">Thêm</button>
                 <button class="button" type="reset" name="reset"  value="reset">Reset</button></div>  
</form>

<?php 
require_once('connect.php');$bird="";
 if(isset($_POST['save']))
{if(empty($_POST['name'])||empty($_POST['produc_id'])||empty($_POST['category'])||empty($_POST['money'])||empty($_POST['description'])||$_FILES['pic']["name"]==null) echo "Vui lòng nhập đầy đủ thông tin vào các trường";
 else {
    
        foreach ($_FILES['pic']['name'] as $key => $value) { 
        $file_name=$_FILES['pic']["name"][$key];
        //lấy đường dẫn tạm lưu nội dung file:
        $file_tmp =$_FILES['pic']['tmp_name'][$key];
        //tạo đường dẫn lưu file trên host:
        $path ="img/produc/".$file_name;
        //upload nội dung file từ đường dẫn tạm vào đường dẫn vừa tạo:
        $upload=move_uploaded_file($file_tmp,$path);
        $bird .=$path ." ";
                                                                    } 
      $add=mysqli_query($conn,"insert into sanpham (name,produc_id,category,money,description,picture) values('".$_POST['name']."','".$_POST['produc_id']."','".$_POST['category']."','".$_POST['money']."','".$_POST['description']."','$bird')");
      if ($add) {echo "Thêm sản phẩm thành công"; header('location:editproduct.php?id='.$_POST['produc_id']);}
      else echo"dell đc";
} }

?><br>
</div>
<div style="height:300px;"></div>
</body>
</html>
<?php include('footer.php');ob_end_flush(); ?>
