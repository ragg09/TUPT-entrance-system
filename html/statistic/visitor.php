<!DOCTYPE html>
<html>
<head>
	<title>TUPT Statistics || Visitor</title>
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	<!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<!-- comment ko muna haha -->
	<!-- <script src="../../js/60secstime.js"></script> -->
	<!-- load google chart API -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<!-- load Bootsrap cdn pwede ding alisin lipat ng main html file this is only temporary
		because i cannot design properly the select button and im having problem with it-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- jquery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
			include('../Statistic-menu.php');
			?>
		</div>

		<div class="b-right">
			<!-- this is where im gonna put the statistics for visitors -->
			<center><h1>VISITOR STATISTIC IS UNDER MAINTENANCE . . .</h1></center>
			<div id="chooseanalytics" class="form-control">
				<input type="radio" name="analytics" value="day" id="choose">Day
				<input type="radio" name="analytics" value="month" id="choose">Month
				<input type="radio" name="analytics" value="year" id="choose">Year
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						 <div class="col-md-9" id="years"></div>
						<div id="chart" style="width: 50%; height: 300px;" class="panel-body">		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<b><p>ALL RIGHTS RESERVED | Yatat Boys &copy;</p></b>
	</div>
</div>
<!-- includes javascript file for controller -->
<script type="text/javascript" src="../../html/visitor.js"></script>