<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO TUPT</title>
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	<!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
	<script src="../../js/jquery-3.4.1.min.js"></script>
	<!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<script src="../../js/60secstime.js"></script>
	<!-- hiding menu -->
	<script src="../../js/hide.js"></script>
</head>
<body>
<img src="../../images/TUP.png" id="tupt-logo"/>
<div class="main-div">
	<img src="../../images/hide.png" id="burger1"/>
	<img src="../../images/show.png" id="burger2"/>

	<div class="header">
		<!-- main header -->
		<?php
			include('../header.php');
		?>
	</div>

	<div class="body">
		<div class="b-left">
			<!-- menu -->
			<?php
			include('../function-menu.php');
			?>
		</div>

		<div class="b-right">
			<center><h1>VEHICLE LOGS IS UNDER MAINTENANCE . . .</h1></center>
		</div>
	</div>

	<div class="footer">
		<b><p>ALL RIGHTS RESERVED | Yatat Boys &copy;</p></b>
	</div>
</div>
</body>
</html>