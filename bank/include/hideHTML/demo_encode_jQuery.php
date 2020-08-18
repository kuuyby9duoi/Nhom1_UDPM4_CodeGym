<?php include'html-encoder.php';?>
<html>
	<head>
		<title>jQuery Hello World</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			var $j = jQuery.noConflict();
			$j(document).ready(function(){
				$j("#msgid").html("This is Hello World by JQuery");
			});
		</script>
		<div id="msgid">
		</div>
		This is Hello World by HTML
	</body>
</html>
