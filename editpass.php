<?php 
include('header.php');
if (empty($_SESSION['user'])) header('location:login.php'); 
else {
 require_once('connect.php');  ob_start(); 
$id=$_GET['id'];   $email=$_SESSION['user'];
$check_admin=mysqli_query($conn,"select * from khachhang where email='$email'");
$check=mysqli_fetch_array($check_admin);
$admin1=$check['admin'];
$id1=$check['id'];
if($admin1!='true'){if($id!=$id1)header('location:editpass.php?id='.$id1);}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Đổi mật khẩu</title>
<style>
*{margin:0;padding:0;}
.container99 {width:300px; height:380px; margin:auto;background-color:#66666659; margin-top:25px; font-size:16px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;}
.text {width:200px; height:40px; border: #80d894d6 1px solid; margin-top:10px; border-radius:20px; outline: none; padding-left: 10px;}
.login {padding-top:20px; text-align:center;font-size:24px;color:#000; font-weight:bold;}
.submit {width:110px; height:40px; margin-top:10px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;transition: transform .2s;outline:none}
.noti {text-align:center; color:#FFF; font-size:15px;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}

</style>
</head>
<body style="background-image: url(img/background.webp);">
<div class="container99">
        <form method="post">
	        <div class="login">Đổi mật khẩu</div>
	        <div><input type="password" name="password" placeholder="  Nhập mật khẩu cũ" class="text" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter"></div>
	        <div><input type="password" name="newpassword" placeholder="  Nhập mật khẩu mới" class="text" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter"></div>
	        <div><input type="password" name="repassword" placeholder="  Nhập lại mật khẩu mới" class="text" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter"></div>
	        <div><input type="submit" name="submit" class="submit" value="Thay đổi" ><button class="submit" name="back" value="back"><a href="javascript:history.back()" style="text-decoration: none; color: #fff;">Quay lại</a></button></div>
        </form>
<div class="noti">
<?php 
    if(isset($_POST['submit']))
	{	$acc=$_GET['acc'];
	   $password=$_POST['password'];
	   $newpassword=$_POST['newpassword'];
	   $repassword=$_POST['repassword'];
	   $session=$_SESSION['user'];
	   if(empty($password)||empty($newpassword)||empty($repassword)) echo "Vui lòng nhập đầy đủ thông tin vào các trường";
	   else
	   {
	   if($newpassword==$repassword)
	   {

	   	$sql="select * from khachhang where id='$id'";
	   	$run=mysqli_query($conn,$sql);
	   	$row=mysqli_fetch_array($run);
	   	$getpass=$row['password'];
	   	$getemail=$row['email'];
	   	$getsalt=$row['salt'];
        $crypt=md5(base64_encode($key).md5($password).md5(md5($getsalt)));
        $crypt_new = md5(base64_encode($key).md5($repassword).md5(md5($getsalt)));
	   	if($crypt==$getpass)
	   	{
	   		$sql_editpass="update khachhang set password='$crypt_new' where id='$id'";
	   		$run_editpass=mysqli_query($conn,$sql_editpass);
	   		if($run_editpass) { echo "Đổi mật khẩu thành công"; if($acc=='pass'){header('location:manager_user.php');}if($getemail==$session){ unset($_SESSION['user']); header('location:login.php'); } }
	   		else echo "Không đổi được mật khẩu";
	   	}
	   	else echo "Mật khẩu cũ không chính xác!";
	   }
		else echo "Mật khẩu mới và nhập lại mật khẩu không khớp!";
	 }}
?>
</div>
</div>
<div style="height:380px;"></div>
</body>
</html>
<?php }
include('footer.php');
?>
