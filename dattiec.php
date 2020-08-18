
<!DOCTYPE HTML?>
<HTML>
<head>
<meta charset="utf8">
<title>BTVN</title>
<style>
.all2 {width: 800px; height: 600px; background-color: #ccc; margin: auto; font-family: arial;margin-top: 100px;}
.text1 { text-align: center; font-size: 20px; font-weight: bold;padding-top: 10px;}
.b {width: 400px;margin-left: 10px;float: left; }
.text2 {float: left; margin-top: 10px;}
.textbox {width:190px;margin-left: 10px;margin-top: 10px;}
.box {margin-left: 10px;margin-top: 10px;}
.gt1 {float: left;}
.clear {clear: both;}
.button {text-align: center; padding-top: 15px}
.submit {color: #000; border-radius: 20px;background-color: #6F9876; width: 100px; height: 35px; font-weight: bold;font-size: 16px;}
textarea {margin-top: 10px;}
</style>
</head>
<body>
<form method="POST">
	<div class="all2">
		<div class="text1">THÔNG TIN ĐẶT TIỆC</div>
		<div class="b"><div class="text2">Số khách tham gia:</div><input type="number" name="people" class="textbox"></div>
		<div><div class="text2">Ngày:</div><input type="date" name="date" class="textbox"></div>
		<div class="b"><div class="text2">Thời gian:</div><input type="checkbox" name="time" class="box" > Sáng<input type="checkbox" name="time1" class="box" value="b">  Trưa<input type="checkbox" name="time2" class="box" value="c"> Tối</div>
		<div class="b"><div class="text2">Địa điểm:</div><input type="radio" name="ad" class="box" value="in" > Trong nhà <input type="radio" name="ad" class="box" value="out"> Ngoài trời</div>
		<div class="b"><div class="text2">Tên khách hàng:</div><div><input type="text" name="name" class="textbox"></div></div>
		<div ><div class="text2">Giới tính:</div><div class="gt1"><input type="radio" name="gt" class="box"> Nam <input type="radio" name="gt" class="box"> Nữ </div></div>
		<div class="b"><div class="text2">Địa chỉ khách hàng:</div><input type="text" name="address" class="textbox"></div>
		<div class="b"><div class="text2">Các yêu cầu của khách hàng:</div></div>
		<div class="b"><textarea name="yeucau" rows="3" cols="30"></textarea></div><div class="clear"></div>
		<div class="b"><div class="text2">khách hàng biết đến nhà hàng qua:</div></div>
			<select class="box">
				<option>website</option>
				<option selected>Báo chí</option>
				<option>Tờ rơi</option>
			</select>
	<div class="button"><input type="submit" name="ok" value="Đặt Tiệc" class="submit"></div>
		
	
	
<?php
	if (isset($_POST['ok']))
		{
			$time=$_POST['time'];
			$ad=$_POST['ad'];
		    $number=$_POST['people'];
	        $tong=$number*200000;
			if($number>20){$a=$tong*10/100;}
			else {$a=0;}
			if($time=='on'){$b=$tong*10/100;}
			else {$b=0;}
			if($ad=='in'){$c=$tong*5/100;}
			else {$c=0;}
		    $all=$tong-$a-$b-$c;	
		echo  "tổng là: $all";
	}
?>
</div>
</form>
</body>
</html>
<?php 
include('footer.php');
?>
