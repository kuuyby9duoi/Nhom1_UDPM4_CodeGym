<?php 
include('../header.php');
ob_start();
if (empty($_SESSION['user'])) header('../location:login.php'); 
else { ?>
<!DOCTYPE HTML?>
<HTML>
<head>
<meta charset="utf8">
<title>Giỏ Hàng</title>
<style>
* { margin: 0; padding: 0;}
.all1 { width: 90%; padding-left: 20px; margin-left: 100px; height: 800px; background-color: #ffffffde; margin: auto; font-family: arial;margin-top: 10px; border-radius: 15px;}
.noti {text-align: center; padding-top: 5%; }
button {width: 100px; height: 28px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 12px; transition: transform .2s;}
button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
a {text-decoration: none; color: #fff;}
.label {background: #f6f6f6; border-top: none; border-bottom: 1px solid #ebebeb;  border-right: 0;  font-size: 1em;  font-weight: 700;  padding: 15px;  text-transform: capitalize; vertical-align: middle;  white-space: nowrap;   border-right: 100px solid #f6f6f6;}
.detail {border-top: 0; border-right: 0; border-bottom: 2px solid #ebebeb;font-weight: 400;font-size: 1em; padding: 25px 10px; vertical-align: middle;}
.input1{ padding-left: 8px; border: 2px solid #ebebeb;color: #4c4c4c; font-size: 15px;font-weight: normal;}
.table1 {padding-top: 30px;}
.a {padding-left: 10px; font-weight: bold; font-size: 16px; height: 27px;color: #000000cf;}
.b {padding-left: 10px; color: #000000cf;}
table {margin: auto;background-color: #fff;}
</style>
</head>
<body>


<form method="POST">
	<div class="all1">
		<?php
			require_once('../connect.php');
			$user=$_SESSION['user']; 
			$check_id=mysqli_query($conn,"select * from khachhang where email='$user' ");
			$id_tmp=mysqli_fetch_array($check_id); $id_kh=$id_tmp['id'];
			$check_cart=mysqli_query($conn,"select * from cart where id_user='$id_kh' "); 
			$cart=mysqli_fetch_array($check_cart);
			$produc_id=$cart['id_product'];
			$sl_mua=$cart['sl_mua'];
			$a=explode(' ',$produc_id);
			$b=explode(' ',$sl_mua);

			$coupon1=$cart['coupon_code'];
			$du=count($a);
			echo "mảng: $du";




			if($produc_id=='') {echo "<h4 class='noti'>Giỏ hàng rỗng, quý khách vui lòng thêm sản phẩm vào giỏ !</h4><br><center><button><a href='javascript:history.back()'>Quay lại</a></button></center>";}
			else {
			
			?>
			<div class="table1">
				<form method="POST">
				<table>
					<tr>
						<th class="label">Hình ảnh</th>
						<th class="label">Sản phẩm</th>
						<th class="label">Giá</th>
						<th class="label">Số lượng</th>
						<th class="label">Tổng tiền</th>
						<th class="label">Xóa bỏ</th>
					</tr>
			<?php 
			$tong2=0;
			 for ($i=0; $i < count($a); $i++) { 
			$run=mysqli_query($conn,"select * from sanpham where produc_id='$a[$i]'"); 
			$num=mysqli_num_rows($run); 
			$sanpham=mysqli_fetch_array($run); 
			$ship=30000;
			$tong1=($b[$i] *  $sanpham['money']); 
			$tong2 += ($b[$i] *  $sanpham['money']);
			?>

					<tr>
						<td class="detail"><img width="90px" height="90px" style="border-radius: 5px;" src="../<?php $path=$sanpham['picture'];
					$c=explode(' ',$path); echo $c[0]; ?>"> </td>
						<td class="detail"><?php echo $sanpham['name']; ?></td>
						<td class="detail"><?php echo $sanpham['money']; ?></td>
						<td class="detail"> <input type="number" inputmode="numeric" name="sl" class="input1" min="0" max="<?php echo $max_mua; ?>" value="<?php echo $b[$i]; ?>" style="margin-left: 20%; width: 45px; height: 38px;"></td>
						<td class="detail"><?php echo $tong1; ?></td>
						<td class="detail">
							 <button type="submit" name="update" value="update" title="thay đổi số lượng hay coupon thì click me!">cập nhật</button>
							 <button name="delete" onclick="return confirm('Bạn có chắc xóa sản phẩm này khỏi giỏ hàng?')"><a href="../acc.php?id=<?php echo $id_kh;?>&id_product=<?php echo $a[$i];?>&acc=delete_cart" title="xóa mạt hàng này khỏi giỏ hàng của bạn">xóa</a></button></td>
					</tr><?php } ?>
					<tr>
						<td class="a" colspan="4">Tạm tính:</td>
						<td class="b"><?php echo $tong2; ?> VNĐ</td>
					</tr>
					<tr>
						<td class="a" colspan="4">Phí Ship:</td>
						<td class="b"><?php echo $ship; ?> VNĐ</td>
					</tr>
					<tr>
						<td class="a" colspan="4">Mã giảm giá:</td>
						 <td colspan="3"><input type="text"  name="coupon_code" class="input1" style=" width: 200px; height: 28px;"></td>
					</tr>
					<tr>
						<td class="a" colspan="4">Tổng tiền:</td>
						<td class="b" style="font-weight: bold;font-size: 20px;"><?php echo $tong3=$tong2+$ship-$coupon1;?> VNĐ</td>
					</tr>
				



					 
					</table><br><br>
					<center><button type="submit" name="pay" value="Thanh toán" title="chuyển bạn đén trang check out nhé!">Thanh toán</button></center>

				
			</div>
			


<?php 


if(isset($_POST['pay'])) { 
		$sl=$_POST['sl'];
		$coupon=$_POST['coupon_code'];
		if(empty($coupon)) { $coupon='0';}
		$randum=mt_rand(0, 100);
		$add=mysqli_query($conn,"insert into invoice (id_invoice,id_user,id_product,sl_mua,ship,coupon,total) values('$randum','$id_kh','$produc_id','$sl_mua','$ship','$coupon','$tong1')");
		if ($add)header('location:pay.php?id='.$randum);
		else echo"dell đc";
	}

if(isset($_POST['update'])) {
		$sl=$_POST['sl'];
		$sl_mua=$cart['sl_mua'];
		str_replace($b[$i], $sl, $b);
		$all_sl .=$sl_mua." ".$sl;
		$coupon=$_POST['coupon_code'];
		if(empty($coupon)) {$coupon='0';}
		$update_sl=mysqli_query($conn,"update cart set sl_mua='$sl',coupon_code='$coupon' where id_user='$id_kh'");header("Refresh:0"); }


 } } include('../footer.php');ob_end_flush();
?>
</div>
</form>
</body>
</html>