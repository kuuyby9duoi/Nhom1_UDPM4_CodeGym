<!DOCTYPE HTML>
<?php
include('header.php'); session_start();
 ob_start();
if (!empty($_SESSION['user'])) header('location:myaccount.php'); 
require_once('connect.php');

?>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
<style>
.container {width:360px; height:400px; margin:auto;background-color:#66666659; margin-top:25px; font-size:16px; font-family:Arial, Helvetica, sans-serif;border-radius:10px;text-align: center;}
.text {width:300px; height:40px; margin-top:20px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 40px;padding-left: 15px;outline: none; }
.login {padding-top:20px; text-align:center;font-size:24px;color:#000; font-weight:bold;}
.submit {width:100px; height:35px;  margin-top:20px; background-color: #cc6f4d73; border-radius:20px;border: #80d894d6 1px solid;color: #FFF; transition: transform .2s; outline: none;}
.submit:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.noti {text-align:center; color: #fd4747d6; font-size:15px;}
#a {padding-top: 8px;}
.fogot_pass {text-decoration: none; color: #000; margin-left: 20px;font-size: 12px;transition: transform .2s;font-weight: bold;}
.fogot_pass:hover {transform: scale(1.2);}
.g-recaptcha {margin-top: 30px;}
</style>
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
</head>
<body style="background-image: url(img/bg.webp); background-repeat: no-repeat;">
<div class="container">
        <form method="post" action="/login.php" name="login" >
          <div class="login">LOGIN</div>
          <div><input type="email" name="email" class="text" placeholder="email" maxlength="54" autocomplete="on" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus required title="characters@characters.domain"></div>
          <div><input type="password" name="password" class="text" maxlength="255" placeholder="password"   required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter"></div>
          <div class="g-recaptcha" data-sitekey="6LeX4_EUAAAAAMINW4xyACqHZnlS5ItL2DmvSPAI" required data-size="nomal"></div>
          <div><input type="submit" name="submit" class="submit" value="Đăng nhập"><button class="submit" style="margin-left: 10px;"><a href="register.php" style="color:#fff;">Đăng ký</a></button></div>
          <div id="a"><a href="fogot_pass.php" class="fogot_pass">>Quên mật khẩu</a></div>
       </form>



      
<div class="noti">








<?php 
if (!empty($_SESSION['user'])) header('location:myaccount.php'); 

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
            
                       {
               $sql="select * from khachhang where email='$username'";
               $run=mysqli_query($conn,$sql);
               $num=mysqli_num_rows($run);
               if($num==1)
                 {
                     $_SESSION['user']=$username;
                 $row=mysqli_fetch_array($run);
                 $pass=$row['password'];
                 //Sử dụng thêm một salt là $key cố định trong file connect
                //Sinh ra chuỗi dài 32 ngẫu nhiên, cũng cần lưu chuỗi này vào một cột trong DB (chỉ file đăng ký)
                 $salt=$row['salt'];
                //mã hóa nè
                $crypt = md5(base64_encode($key).md5($password).md5(md5($salt)));
                 if($crypt==$pass) { header("Location:myaccount.php");}             
                 else echo "Sai password!"; 
               }
               else echo "Sai tên đăng nhập!";
             }





          } else {$message = "Please confirm CAPTCHA";}
    }
}












     }}
?>
</div>
</div>
</body>
<?php 
;ob_end_flush();
?>
</html>