<!DOCTYPE HTML?>
<?php 
include('header.php'); require_once('connect.php'); ob_start(); 

$email=$_SESSION['user'];
$check_admin=mysqli_query($conn,"select * from khachhang where email='$email'");
$check=mysqli_fetch_array($check_admin);
$admin1=$check['admin'];
if (empty($_SESSION['user'])||$admin1!='true') header('Location:myaccount.php');
else { 
?>
<HTML>
<head>
<meta charset="utf8">
<title>edit product</title>
<style>
*{margin: 0px; padding: 0px;}
.product {width: 90%; padding-left: 20px; margin-left: 100px; height: 800px; background-color: #ffffffb8; margin: auto; font-family: arial;margin-top: 20px; border-radius: 15px;color: #000;}
.info{width: 95%;height: 700px; }
.name { font-size: 20px; font-weight: bold;padding-top: 20px; }
.picture {width: 550px; height: 550px; padding-top: 20px; float: left;}
.picture img:hover {transform: scale(1.4);}
.sub_picture {position: relative; top: -15%; left: 100px; transition: transform .2s;width: 330px;}
.sub_picture img:hover {transform: scale(1.4);}
.price {font-size: 20px; color: #79a206; float: left;margin: 10px 20px 25px 0px;}
.old_price {color: #999; font-size: 20px; text-decoration: line-through; margin: 10px 20px 25px 0px;}
.tt {font-size: 13px;margin-top: 15px; margin-right: 50px;font-weight: bold;}
.rr {font-size: 13px;position: absolute;left: 65%;font-weight: bold;width: 150px; margin-top: -35px;}

.cmt {border: #80d894d6 1px solid; border-radius: 20px;padding-left: 10px;width: 500px; height: 100px;margin-top: 30px; }
.button_bar {text-align: center;margin-top: 30px;}
button {width: 110px; height: 40px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 20px; transition: transform .2s;}
button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.text1 { text-align: center; font-size: 20px; font-weight: bold;padding-top: 10px;}
.text2 {width: 400px; height: 40px; margin-top: 20px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 40px;padding-left: 15px;}
input[type='file']{display: none;}
input {border:#000 1px solid; border-radius: 10px; height: 20px;padding-left: 10px;}
.aaa {height: 30px;}
.input_left {position: absolute;left: 45%;}
.input_right {position: absolute;left: 90%; bottom: 6%;}
select {width: 180px; height: 21px;border-radius: 8px;border: #000 1px solid;}
</style>
</head>
<body style="background-image: url(img/background.webp);">
<form method="POST" enctype="multipart/form-data">
		


<?php 
$id=$_GET['id'];
$run=mysqli_query($conn,"select * from sanpham where produc_id='$id'");
$num=mysqli_num_rows($run);
$row_option=mysqli_fetch_array($run);
$name=$row_option['name'];
$price=$row_option['money'];
$old_price=$row_option['old_price'];
$category=$row_option['category'];
$description=$row_option['description'];
$in_stock=$row_option['in_stock'];
$weight=$row_option['weight'];
$chat_lieu=$row_option['chat_lieu'];
$xuatxu=$row_option['xuatxu'];
$baohanh=$row_option['baohanh'];
$ten_thuong_goi=$row_option['ten_thuong_goi'];
$ten_khoa_hoc=$row_option['ten_khoa_hoc'];
$ten_goi_khac=$row_option['ten_goi_khac'];
$nguon_goc=$row_option['nguon_goc'];
$dac_diem=$row_option['dac_diem'];
$size=$row_option['size'];
$giao_hang=$row_option['giao_hang'];
$ho=$row_option['ho'];
$danh_gia=$row_option['danh_gia'];
$max_mua=$row_option['max_mua'];
$path=$row_option['picture'];
$a=explode(' ',$path);
$pic=count($a);
?>
	<div class="product">
		<div class="text1">Thay đổi thông tin</div>
		<div class="picture"><input type="file" name="product_path"><img src="../<?php echo $a[0]; ?>" width="500px" height="550px" style="border-radius: 8px;transition: transform .2s;" > </div>
		<div class="info">
			<div class="name">Tên sản phẩm:<input type="text" name="name" value="<?php echo $name; ?>"></div>
			<div class="price">Giá sale:<input type="number" name="price" value="<?php echo $price; ?>" >VNĐ</div>
			<div class="old_price">Giá cũ:<input type="number" name="old_price" value="<?php echo $old_price; ?>">VNĐ</div>
			<p class="tt">Mô tả:<input type="text" style="width: 700px; height: 25px; " name="description" value="<?php echo $description; ?>" class="input_left"></p>
			<p class="tt">Số lượng mua tối đa<input type="number" name="max_mua" value="<?php echo $max_mua; ?>" class="input_left" ></p>
			<p style="font-weight: bold; margin-top: 20px;">Thông Tin Bổ Sung</p>
			<p class="tt">SKU:<input type="text" name="SKU" value="<?php echo $id;?>" class="input_left"></p><p class="rr">Tên Thường gọi:<input type="text" name="ten_thuong_goi" value="<?php echo $ten_thuong_goi ;?>" class="input_right"> </p>
			<p class="tt">Còn:<input type="number" name="in_stock" value="<?php echo $in_stock;?>" class="input_left"> </p><p class="rr">Tên khoa học:<input type="text" name="ten_khoa_hoc" value="<?php echo $ten_khoa_hoc ;?>" class="input_right"> </p>
			<p class="tt">Dòng sản phẩm:<select name="category" class="input_left" title="chọn danh mục sản phẩm">
                        <option value="Cây trong nhà" <?php if($category=='Cây trong nhà') echo "selected"; ?>>  Cây trong nhà</option>
                        <option value="Cây ngoài trời" <?php if($category=='Cây ngoài trời') echo "selected"; ?>>Cây ngoài trời</option>
                        <option value="Cây để bàn" <?php if($category=='Cây để bàn') echo "selected"; ?>>    	 Cây để bàn</option>
                        <option value="Cây mini" <?php if($category=='Cây mini') echo "selected"; ?>>      		 Cây mini</option>
                        <option value="Cây thủy canh" <?php if($category=='Cây thủy canh') echo "selected"; ?>>  Cây thủy canh</option>
                        <option value="Cây công trình" <?php if($category=='Cây công trình') echo "selected"; ?>>Cây công trình</option>
                        <option value="Phân bón" <?php if($category=='Phân bón') echo "selected"; ?>>   		 Phân bón</option>
                        <option value="Chậu" <?php if($category=='Chậu') echo "selected"; ?>>		    		 Chậu</option>
                  </select> </p><p class="rr">Tên gọi khác:<input type="text" name="ten_goi_khac" value="<?php echo $ten_goi_khac ?>" class="input_right"></p>
			<p class="tt">Trọng lượng:<input type="text" name="weight" value="<?php echo $weight ;?>" class="input_left"></p><p class="rr">Nguồn gốc:<input type="text" name="nguon_goc" value="<?php echo $nguon_goc ;?>" class="input_right"></p>
			<p class="tt">Kích thước:<input type="text" name="size" value="<?php echo $size ;?>" class="input_left"></p><p class="rr">Đặc điểm:<input type="text" name="dac_diem" value="<?php echo $dac_diem ;?>"class="input_right"></p>
			<p class="tt">Chất liệu:<input type="text" name="chat_lieu" value="<?php echo $chat_lieu ;?>" class="input_left"></p><p class="rr">Hình thức giao hàng:<input type="text" name="ship" value="<?php echo $giao_hang ;?>" class="input_right"></p>
			<p class="tt">Xuất xứ:<input type="text" name="xuatxu" value="<?php echo $xuatxu ;?>" class="input_left"></p><p class="rr">Thuộc họ:<input type="text" name="ho" value="<?php echo $ho ;?>" class="input_right"></p>
			<p class="tt">Bảo hành:<input type="text" name="baohanh" value="<?php echo $baohanh ;?>" class="input_left"></p><p class="rr">Đánh giá:<input type="text" name="danh_gia" value="<?php echo $danh_gia ;?>" class="input_right"></p>
			<div class="comment"><textarea name="comment" class="cmt">Để lại đánh giá hay bất kỳ câu hỏi nào!</textarea></div>
			<div class="button_bar">
			<button type="reset" name="reset" value="reset">Reset</button>
			<button name="save" value="Lưu lại">Lưu lại</button>
			<button name="back" value="back"><a href="javascript:history.back()" style="text-decoration: none; color: #fff;">Quay lại</a></button>
			</div>
		</div>
		<div class="sub_picture"> <?php for ($i=0; $i < $pic-1; $i++) { echo " <img src='../$a[$i]' width='100px' height='100px' style='border-radius:6px;'> ";} ?></div>

		
	
<?php 
 if(isset($_POST['save']))
	{
$name1=$_POST['name'];
$price1=$_POST['price'];
$old_price1=$_POST['old_price'];
$category1=$_POST['category'];
$description1=$_POST['description'];
$in_stock1=$_POST['in_stock'];
$weight1=$_POST['weight'];
$chat_lieu1=$_POST['chat_lieu'];
$xuatxu1=$_POST['xuatxu'];
$baohanh1=$_POST['baohanh'];
$ten_thuong_goi1=$_POST['ten_thuong_goi'];
$ten_khoa_hoc1=$_POST['ten_khoa_hoc'];
$ten_goi_khac1=$_POST['ten_goi_khac'];
$nguon_goc1=$_POST['nguon_goc'];
$dac_diem1=$_POST['dac_diem'];
$size1=$_POST['size'];
$giao_hang1=$_POST['ship'];
$ho1=$_POST['ho'];
$danh_gia1=$_POST['danh_gia'];
$max_mua1=$_POST['max_mua'];
	if(empty($max_mua1)) $max_mua1='8';
	if(empty($xuatxu1)) $xuatxu1='Việt Nam';
	if(empty($giao_hang1)) $giao_hang1='cod';
	if(empty($danh_gia1)) $danh_gia1='1 lượt đánh giá';
	if(empty($baohanh1)) $baohanh1='Không hỗ trợ';
	if(empty($old_price1)) $old_price1=$price+50000;
	$sql="update sanpham set name='$name1',category='$category1',money='$price1',old_price='$old_price1',description='$description1',in_stock='$in_stock1',weight='$weight1',size='$size1',chat_lieu='$chat_lieu1',xuatxu='$xuatxu1',baohanh='$baohanh1',ten_thuong_goi='$ten_thuong_goi1',ten_khoa_hoc='$ten_khoa_hoc1',ten_goi_khac='$ten_goi_khac1',nguon_goc='$nguon_goc1',dac_diem='$dac_diem1',giao_hang='$giao_hang1',ho='$ho1',danh_gia='$danh_gia1',max_mua='$max_mua1' where produc_id='$id'";
	$run=mysqli_query($conn,$sql);if($run){echo "Cập nhật thông tin thành công!"; header("Refresh:0");}
									else echo "lỖi!".$conn->error;
	}


 }  
include('footer.php');ob_end_flush(); 
?>
	</div>
</form>
</body>
</html>