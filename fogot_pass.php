<?php session_start(); 
include('header.php');

  ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>quên mật khẩu</title>
<style>
body{background-image: url(img/bg.webp); background-repeat: no-repeat;}
.containerz {width:auto;max-width:400px;text-align:center; height:350px; margin:auto;background-color:#66666659; margin-top:25px; font-size:18px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;}
.text {width:auto;max-width:200px; height:40px;  margin-top:10px; border-radius:6px;outline:none ;font-size:15px;}
.login {padding-top:20px; text-align:center;font-size:24px;color:#000; font-weight:bold;}
.submit {width:150px; height:40px; margin-top:10px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;transition: transform .2s;outline:none;}
.noti {text-align:center; color:#FFF; font-size:15px;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.g-recaptcha {margin-left:50px; margin-top: 30px;}

</style>
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
</head>
<body>
<div class="containerz">
        <form method="post">
	        <div class="login">Quên mật khẩu</div>
	        <div><input type="email" name="email" placeholder="  Nhập email" class="text"></div>
	        <div class="g-recaptcha" data-sitekey="6LeX4_EUAAAAAMINW4xyACqHZnlS5ItL2DmvSPAI" required data-size="nomal"></div>
	        <div><input type="submit" name="submit" class="submit" value="reset" ></div>
        </form>
<div class="noti">
<?php 

    if(isset($_POST['submit']))
  {  
     $username1=$_POST['email'];
     $password=$_POST['password'];
     $username=htmlspecialchars(trim($username1));
    //kiểm tra trong chuỗi có khoảng trắng không
    if (preg_match('/\s/', $username))echo 'error input type'; 
    else {include('connect.php');



class GoogleRecaptcha 
{
    /* Google recaptcha API url */
    private $google_url = "https://www.google.com/recaptcha/api/siteverify";
    private $secret = '6LeX4_EUAAAAAGvE5At5rUQoM4-Q5ARZ8kx6uM8o';
  
    public function VerifyCaptcha($response)
    {
        $url = $this->google_url."?secret=".$this->secret.
               "&response=".$response;
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, TRUE); 
        $curlData = curl_exec($curl);
  
        curl_close($curl);
  
        $res = json_decode($curlData, TRUE);
        if($res['success'] == 'true') 
            return TRUE;
        else
            return FALSE;
    }
  
}
  
$message = 'Google reCaptcha';
  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $response = $_POST['g-recaptcha-response'];
  
    if(!empty($response))
    {
          $cap = new GoogleRecaptcha();
          $verified = $cap->VerifyCaptcha($response);
  
          if($verified) {
                    require_once('connect.php'); 
                       $email1=$_POST['email'];
                	   $captra=$_POST['captra'];
                	   if(empty($email1)) echo "Vui lòng nhập đầy đủ các trường!";
                	   else
                	   {
                	   	$sql_select_data="select * from khachhang where email='$email1'";
                	   	$run=mysqli_query($conn,$sql_select_data);
                	   	$row=mysqli_fetch_array($run);
                	   	$getemail=$row['email'];
                
                	   	if($email1==$getemail)
                	   	{
                	   		$password_old=$row['password'];
                	   		echo "<script>alert('Bạn sẽ sớm nhận được email có kèm password mới. Lưu ý trong hộp thư rác!');</script>";
                	   	}
                	   	else echo "Tài khoản không tồn tại!";
                	   }





          } else {$message = "Please confirm CAPTCHA";}
    }
}



     }}
?>

















</div>
</div>
</body>
<div style="height:300px;"></div>
</html>
<?php include('footer.php'); ?>
