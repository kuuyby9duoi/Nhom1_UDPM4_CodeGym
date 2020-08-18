<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Classes/PHPMailer/src/  Exception.php';
require 'Classes/PHPMailer/src/PHPMailer.php';
require 'Classes/PHPMailer/src/  SMTP.php';
require('connect.php');

if(isset($_POST['sent'])) {
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'hs21698.tino.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sales@hactech.trinhsydu.com';                     // SMTP username
    $mail->Password   = '0369918375';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom($_POST['from'], 'Sales QuanCayNho');
    $mail->addAddress($_POST['to'], 'Joe User');     // Add a recipient
    $mail->addAddress('sales@hactech.trinhsydu.com');               // Name is optional
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['body'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent okokokok';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}





 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Quản lý Email</title>
<style type="text/css">
.all {width: 95%;margin: auto; height: 900px;position: relative;}
#left {width: 750px; height: 450px; background-color: #79797985; margin-left: 50px; font-family: arial;margin-top: 100px;border-radius: 15px;color: #ffffffc2;}
#right {width: 750px; height: 450px; background-color: #79797985; position: absolute; right: 10px; top: 0px; font-family: arial;border-radius: 15px;color: #ffffffc2;padding-top: 0px;}
.text1 {padding-top:20px; margin:auto; text-align:center;  font-weight:bold;color: #fff;}
.text2 {height: 15px; color:#fff; margin-top:10px; width:250px; float:left; padding-left:10px;font-weight: bold; line-height: 25px;}
.inputtext { width: 400px;  margin-top: 10px; border: #80d894d6 1px solid; border-radius: 20px; line-height: 35px;padding-left: 15px;}
.radio {width:15px; height:20px; margin-top:7px; margin-left: 30px; vertical-align: bottom;}
#button {text-align:center;  margin-top:15px;}
button {width: 100px; height: 40px; background-color: #cc6f4d73; border: #80d894d6 1px solid; border-radius: 20px;color: #FFF;margin-left: 20px; transition: transform .2s;}
button:hover {color: #000;background-color: #80d894d6;transform: scale(1.2);}
.quequan {width:400px; height:20px; margin-top:10px; border: #80d894d6 1px solid; border-radius: 20px;padding-left: 8px; height: 25px;}
.quequan option {color: #fff;background-color: #cc6f4d73;}
.quequan option:hover {color: #000;background-color: #80d894d6;}
.noti {height: 15px;width: 800px; height: 80px; color:#ff0201bd;margin-left: 45px; margin-top:10px;padding-left:10px; line-height: 25px;border-radius: 20px;}
</style>
</head>
<body style="background-image: url(img/background.webp);">
  <center><img src="upload/email.svg"></center>
<div class="all">
<form method="post">
    <div id="left">
            <div class="text1">Cài đặt email</div>
            <div class="text2">Máy chủ SMTP:</div>
            <div><input type="url" name="sever" class="inputtext" placeholder="mail.trinhsydu.com"></div>
            <div class="text2">Cổng:</div>
            <div><input type="number" name="port" class="inputtext" placeholder="465"></div>
            <div class="text2">security</div>
            <div> <select name="security" class="quequan" title="chọn phương thức">
                        <option value="TSL" selected>TSL</option>
                        <option value="SSl">SSl</option>
                  </select></div>
            <div class="text2">Tài khoản:</div>
            <div><input type="email" name="username" class="inputtext" placeholder="sale@trinhsydu.com"></div>
            <div class="text2">Mật khẩu:</div>
            <div><input type="password" name="passwword" class="inputtext" placeholder="*********"></div>
         
            <div id="button">
                 <button type="button" name="save" value="save">Lưu</button>
                 <button type="reset" name="reset"  value="reset">Reset</button> </div>  
    </div>
</form>





    <div id="right">
        <form method="post">
           <div class="text1">Gửi email</div>
             <div class="text2">Gửi từ</div>
            <div> <select name="from" class="quequan" title="chọn phương thức">
                        <option value="admin@trinhsydu.com" >admin@trinhsydu.com</option>
                        <option value="sales@hactech.trinhsydu.com" selected>sales@hactech.trinhsydu.com</option>
                  </select></div>
            <div class="text2">Tiêu đề:</div>
            <div><input type="text" name="subject" class="inputtext" placeholder="trả lời | Mật khẩu đã thay đổi|..."></div>
            <div class="text2">Loại email:</div>
             <div><input type="radio" name="type" class="radio" value="text">Văn Bản Thuần<input type="radio" name="type" class="radio" value="html">HTML<input type="radio" name="type" class="radio" value="php">PHP </div>
            <div class="text2">Người nhận:</div>
            <div><input type="email" name="to" class="inputtext" placeholder="sale@trinhsydu.com"></div>
            <div class="text2">Nội dung:</div>
            <div><textarea name="body" class="inputtext" placeholder="nội dung nè" title="Kéo chuột vào góc dưới phải để tăng kích thước."></textarea></div>
         
            <div id="button">
                 <button type="submit" name="sent" value="sent">Gửi</button>
                 <button type="submit" name="save" value="save">Lưu</button>
                 <button type="reset" name="reset"  value="reset">Reset</button> </div>  
        
    </div></form>
</div>
</body>
<?php ob_end_flush();?>
</html>

