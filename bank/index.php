<?php //include'include/hideHTML/html-encoder.php';?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login /Forgot</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!-- partial:index.partial.html -->

<div id="app" style="font-family:font_txt;font-weight: bold;"></div>
<!-- partial -->


<span class="notification">
			<?php
				if(!empty($_SESSION['user']))header('location:myaccount.php'); 
				require_once('act.php');
				    if(isset($_POST['signin'])){
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
					        else{ if(empty($_POST['stk'])||empty($_POST['password'])) echo "Please enter your full information!";
								   else { $test=select_user($_POST['stk'],$_POST['password']);} }
					     	 

					     	 }

								}
			?></span>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.9.0/umd/react.production.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.8.6/umd/react-dom.production.min.js'></script>
<script  src="assets/js/script.js"></script>

</body>
</html>