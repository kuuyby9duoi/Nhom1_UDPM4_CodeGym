<?php  ob_start();

$acc=$_GET['acc']; 
if($acc=='view') header('location:index_2.php?sldong=21&page=1');
else {
 ?>
<!DOCTYPE HTML?>
<HTML>
<head>
<meta charset="utf8">
<title>Cửa hàng</title>
<style>
*{margin: 0px; padding: 0px;}
.product {width: 90%; padding-left: 20px; margin-left: 100px; height: 800px; background-color: #ffffffb8; margin: auto; font-family: arial;margin-top: 20px; border-radius: 15px;color: #000;}
.info{width: 95%;height: 700px; }
.name { font-size: 40px; font-weight: bold;padding-top: 20px; }
button {width: 100px; height: 28px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 12px; transition: transform .5s;}
.picture {width: 550px; height: 550px; padding-top: 20px; float: left;}
.picture img:hover {transform: scale(1.4);}
.sub_picture {position: relative;left: 100px; top: -15%;transition: transform .2s;}
.sub_picture img:hover {transform: scale(1.4);}
.price {font-size: 20px; color: #79a206; float: left;margin: 10px 20px 25px 0px;}
.old_price {color: #999; font-size: 20px; text-decoration: line-through; margin: 10px 20px 25px 0px;}
.tt {font-size: 13px;margin-top: 9px; margin-right: 50px;font-weight: bold;}
.rr {font-size: 13px;position: absolute;left: 65%;font-weight: bold;margin-top: -40px;}
.description {margin-top: 30px;padding-right: 300px;}
.sl_mua {height: 40px;width: 100px; margin-top: 20px; margin-left: 30px; margin-right:30px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 40px;padding-left: 15px;}
button {width: 110px; height: 40px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF; margin-left: 20px; transition: transform .2s; line-height: 40px;}
button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}

.sale {background-color: red;width: 40px;height: 30px; font-weight: bold;line-height: 30px;padding-left: 5px; color: #fff;position: relative;top:-92%;left: 150%;}
</style>
</head>
<body>
<?php 
include('../header.php'); require_once('../connect.php'); 
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
		<div class="picture"><img src="../<?php echo $a[0]; ?>" width="500px" height="550px" style="border-radius: 8px;transition: transform .2s;" ><p class="sale"><?php $sub=($price - $old_price)/$old_price * 100;      echo round($sub, 0); ?>%</p></div>
		<div class="info">
			<div class="name"><?php echo $name; ?></div>
			<div class="price"><?php echo $price; ?> VNĐ</div>
			<div class="old_price"><?php echo $old_price; ?>VNĐ</div>
			<p class="description"><?php echo $description; ?></p>
			<form method="POST">
				<input type="number" inputmode="numeric" name="sl" value="1" class="sl_mua" min="0" max="<?php echo $max_mua; ?>">
				<button type="submit" name="mua"  value="mua" onclick="<?php if(empty($_SESSION['user'])) {echo "return confirm('Bạn chưa đăng nhập! Bạn có muốn chuyển đến trang đăng nhập hơm?' )";} ?>"> Mua</button>
			</form>
			<p style="font-weight: bold; margin-top: 20px;">Thông Tin Bổ Sung</p>
			<p class="tt">SKU: <?php echo $id ?></p><p class="rr">Tên Thường gọi:<?php echo $ten_thuong_goi ; ?>				</p>
			<p class="tt">Còn: <?php echo $in_stock; ?></p><p class="rr">Tên khoa học: <?php echo $ten_khoa_hoc ; ?>			</p>
			<p class="tt">Dòng sản phẩm: <?php echo $category; ?></p><p class="rr">Tên gọi khác:<?php echo $ten_goi_khac ; ?>	</p>
			<p class="tt">Trọng lượng: <?php echo $weight ; ?></p><p class="rr">Nguồn gốc: <?php echo $nguon_goc ; ?>			</p>
			<p class="tt">Kích thước: <?php echo $size ; ?></p><p class="rr">Đặc điểm: <?php echo $dac_diem ; ?>				</p>
			<p class="tt" style="margin-left: 550px;">Chất liệu: <?php echo $chat_lieu ; ?></p><p class="rr">Hình thức giao hàng: <?php echo $giao_hang ; ?></p>
			<p class="tt" style="margin-left: 550px;">Xuất xứ: <?php echo $xuatxu ; ?></p><p class="rr">Thuộc họ: <?php echo $ho ; ?>						</p>
			<p class="tt" style="margin-left: 550px;">Bảo hành: <?php echo $baohanh ; ?></p><p class="rr">Đánh giá: <?php echo $danh_gia ; ?>				</p>
			
		</div>
		<div class="sub_picture"> <?php for ($i=1; $i < $pic-1; $i++) { echo " <img src='../$a[$i]' width='100px' height='100px' style='border-radius: 4px;' > ";} ?></div>
	</div>	
<?php
if(isset($_POST['mua'])) {
$sl=$_POST['sl'];
	if(empty($_SESSION['user'])) 
		{header('Location:../login.php');} 
	else {
		$email=$_SESSION['user'];
		$check_id=mysqli_query($conn,"select * from khachhang where email='$email' ");
		$khachhang=mysqli_fetch_array($check_id); $id_kh=$khachhang['id'];


		$check_cart=mysqli_query($conn,"select * from cart where id_user='$id_kh' "); 
		
		$search=mysqli_num_rows($check_cart);
		echo "search=$search";

		if($search==1) 	{
				$cart=mysqli_fetch_array($check_cart);
				$produc_id=$cart['id_product'];
				$sl_mua=$cart['sl_mua'];
				$all_sl .=$sl_mua." ".$sl;
				$all_product .=$produc_id." ".$id;
				$update_admin=mysqli_query($conn,"update cart set id_product='$all_product',sl_mua='$all_sl' where id_user='$id_kh'");
				header('location:cart.php?id='.$id .'&sl='.$sl); 
						}
		else {
				$coupon_code='0';
				$insert_cart=mysqli_query($conn,"insert into cart values('$id_kh','$id','$sl','$coupon_code')");
				header('location:cart.php');
			}

 		}
  }  include('../footer.php');ob_end_flush();} ?>
</body>
</html>
