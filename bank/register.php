<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="container">
		<form method="post" action="/register.php" name="register" onsubmit="return validateForm()">
			<input type="email" name="email" class="input" placeholder="card number" maxlength="14" autocomplete="on" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus required title="characters@characters.domain"><div></div>
			<input type="password" name="password"   class="input" maxlength="255" placeholder="password"   required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter">
			<input type="password" name="repassword" class="input" maxlength="255" placeholder="repassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter">
			<div class="g-recaptcha" data-sitekey="6Ld2pbsZAAAAALTRnktgLhI8WbfYDgN99Dh8lNz0" required style=""></div>
			<input type="submit" name="register" value="register" class="button" formenctype="multipart/form-data">
			<span class="notification">
			<?php
				if(!empty($_SESSION['user']))header('location:myaccount.php'); 
				require_once('act.php');
				    if(isset($_POST['register'])){
						$name=$_POST['email'];
			     		$captcha;
					     if(isset($_POST['g-recaptcha-response'])){$captcha=$_POST['g-recaptcha-response'];}
					     if(!$captcha){echo '<h2>Please confirm CAPTCHA</h2>';}
					     else{
					        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld2pbsZAAAAAL7kwDjmUxL6b6l5ncgzixmyoaHU&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					         $response = json_decode($response);
						    if(!isset($response->success))
						    {
						        echo 'Captcha is not correct';
						    }
					        if($response->success == false){echo '<h2>SPAM!</h2>';}
					        else{ if(empty($_POST['email'])||empty($_POST['password'])||empty($_POST['repassword'])) echo "Please enter your full information!";
								  else { if($_POST['password']==$_POST['repassword']) $test=register_user($_POST['email'],$_POST['password']); else echo"Password incorrect";}
 								}
					     	  }

					}
			?></span>
			<span class="hyper"><a href="login.php" href="login with email and password" class="link">Login</a></span>       
			<span class="hyper"><a href="forgot_pass.php" href="lost my password" class="link" style="color: red;text-decoration: ">Forgot password</a></span>
		</form>
	</div>
</body>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">.rc-anchor-light.rc-anchor-normal{border:3px solid #d3d3d3 !important}</style>
</html>

















