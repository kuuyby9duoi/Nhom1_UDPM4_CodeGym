<!DOCTYPE HTML?>
<?php 
include('../header.php'); require_once('../connect.php'); 
$email1=$_SESSION['user'];
ob_start(); ?>
<HTML>
<head>
<meta charset="utf8">
<title>Thanh toán</title>
<style>
*{margin:0px; padding: 0px;}
.all1 {width: 60%; padding-left: 20px;padding-right: 20px; margin-left: 100px; height: 800px; background-color: #797979a3; margin: auto; font-family: arial;margin-top: 20px; border-radius: 15px;color: #fff;}
.text1 { text-align: center; font-size: 20px; font-weight: bold;padding-top: 10px;}
.submit {margin-top: 15px; width: 110px; height: 35px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 12px; transition: transform .2s;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
#top {height: 950px;padding-top: 20px;}
a {text-decoration: none; color: #fff;}
.a { height: 40px; font-size: 16px;margin-left: 15%;}
.b { height: 40px;position: relative; left: 35%;top: -40px;}
.input {width: 400px; height: 40px; border: #80d894d6 1px solid; border-radius: 20px; padding-left: 15px;margin-top: -15px;outline: none;}
</style>
</head>
<body style="background-image: url(../img/bg.jpg);">
<form method="POST">
	<div class="all1">
	   <div class="text1">Thanh Toán</div>
	   <div id="top">
		<?php 
		$id=$_GET['id']; $email=$_SESSION['user'];
		$run1=mysqli_query($conn,"select * from invoice where id_invoice='$id'");	$invoice=mysqli_fetch_array($run1);
		$run2=mysqli_query($conn,"select * from khachhang where email='$email'"); 	$khachhang=mysqli_fetch_array($run2); $id_kh=$khachhang['id']; 
		$run3=mysqli_query($conn,"select * from cart where id_user='$id_kh'"); 		$cart=mysqli_fetch_array($run3);

			$produc_id=$invoice['id_product'];
			$sl_mua=$invoice['sl_mua'];
			$e=explode(' ',$produc_id);
			$f=explode(' ',$sl_mua);
			
		 ?>
				
					<div class="a">Sản Phẩm:</div>					 	<div class="b"><?php for ($i=0; $i < count($e); $i++){ $run4=mysqli_query($conn,"select * from sanpham where produc_id='$e[$i]'"); $sanpham=mysqli_fetch_array($run4); echo $sanpham['name']. " x " .$f[$i] ."<br>"; } ?></div>
					<div class="a">Phí Ship:</div> 						<div class="b"><?php echo $invoice['ship']; ?>VNĐ</div>
					<div class="a">Tổng tiền:</div> 					<div class="b"><?php echo $invoice['total']; ?>VNĐ</div>
					<div class="a">Họ Tên:</div> 						<div class="b"><input type="text" name="name" class="input"    value="<?php echo $khachhang['name']?>"></div>
					<div class="a">Địa chỉ giao hàng:</div>				<div class="b"><input type="text" name="address" class="input" value="<?php echo $khachhang['address']?>"></div>
					<div class="a">SĐT:</div> 							<div class="b"><input type="number" name="phone" class="input" value="0<?php echo $khachhang['phone']?>"></div>
					<div class="a">email:</div> 						<div class="b"><input type="email" name="email" class="input"  value="<?php echo $khachhang['email']?>"></div>
					<div class="a">Ghi chú:</div> 						<div class="b"><input type="text" name="note" class="input"    placeholder="VD: Giao hàng vào giờ hành chính,..."></div>
					<center><div><input type="checkbox" name="policy"> Tôi đã đọc và đồng ý với <a href="#"> điều khoản và điều kiện</a> của website *</div>
					<div><input type="submit" name="dathang" value="Đặt hàng" class="submit"></div></center>
				</form>
				<?php 
if(isset($_POST['dathang'])) {
$add=mysqli_query($conn,"update invoice set name='".$_POST['name']."',phone='".$_POST['phone']."' ,email='".$_POST['email']."',address='".$_POST['address']."',note='".$_POST['note']."',status='1' where id_invoice='$id' ");
      if ($add) {echo "Đặt hàng thành công"; }
      else echo"dell đc";



}



?>
				</div>
	
		</div>	
</body>
</html>
<?php  ob_end_flush(); include('../footer.php');?>