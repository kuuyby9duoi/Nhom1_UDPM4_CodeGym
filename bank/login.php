<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="container">
		<form method="post">
			<input type="number" name="stk" class="input" placeholder="card number" maxlength="14" autocomplete="on" autofocus required><div></div>
			<input type="password" name="password" class="input" maxlength="255" placeholder="password" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><div></div>
			<div class="g-recaptcha" data-sitekey="6Ld2pbsZAAAAALTRnktgLhI8WbfYDgN99Dh8lNz0" required style=""></div>
			<input type="submit" name="login" value="login" class="button" formenctype="multipart/form-data">
			<span class="notification">
			<?php
				if(!empty($_SESSION['user']))header('location:myaccount.php'); 
				require_once('act.php');
				    if(isset($_POST['login'])){
						$name=$_POST['stk'];
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
					        else{ if(empty($_POST['stk'])||empty($_POST['password'])) echo "Please enter your full information!";
								   else { $test=select_user($_POST['stk'],$_POST['password']);} }
					     	 

					     	 }

								}
			?></span>
			<p class="hyper"><a href="register.php" href="register a account" class="link">Register</a></p>
			<p class="hyper"><a href="forgot_pass.php" href="lost my password" class="link" style="color: red;text-decoration: ">Forgot password</a></p>
		</form>
	</div>
</body>
</html>
