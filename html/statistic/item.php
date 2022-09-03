
<?php 
require("../../php/config.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>TUPT Statistics || Item</title>
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
	<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
	<script src="../../js/hide.js"></script>
</head>
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
			<div id="chooseanalytics" class="form-control">
				<input type="radio" name="analytics" value="day" id="choose" onclick="day()">Day
				<input type="radio" name="analytics" value="month" id="choose" onclick="month()">Month
				<input type="radio" name="analytics" value="year" id="choose" onclick="year()">Year
				<a href="http://localhost/tupt-entrance/html/statistic/item-predict.php"><button>PREDICTIVE</button></a>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						 <div class="col-md-9" id="day" style="display: none;">
						 	<select id="select-day" style="text-align-last: center;">
								<option>Today</option>
								<?php
									$query = "SELECT DISTINCT DATE_FORMAT(DATE(Time_IN), '%M %d %Y') as day FROM item_log ORDER BY Time_IN ASC";
									$result=mysqli_query($mysqli, $query);
										while($row=mysqli_fetch_array($result))
										{
											echo '<option name="kuha-day" value="'.$row['day'].'">'.$row['day'].'</option>';
												
										}	
								  ?>
							</select>
							
						 </div>
						 <div class="col-md-9" id="month" style="display: none;">
						 	<select id="select-month" style="text-align-last: center;">
								<option>This Month</option>
								<?php
									$query = "SELECT DISTINCT DATE_FORMAT(DATE(Time_IN), '%M %Y') as month FROM item_log ORDER BY Time_IN ASC";
									$result=mysqli_query($mysqli, $query);
										while($row=mysqli_fetch_array($result))
										{
											echo '<option name="kuha-month" value="'.$row['month'].'">'.$row['month'].'</option>';
												
										}	
								  ?>
							</select>
						 </div>
						 <div class="col-md-9" id="year" style="display: none;">
						 	<select id="select-year" style="text-align-last: center;">
								<option>This Year</option>
								<?php
									$query = "SELECT DISTINCT DATE_FORMAT(DATE(Time_IN), '%Y') as year FROM item_log ORDER BY Time_IN ASC";
									$result=mysqli_query($mysqli, $query);
										while($row=mysqli_fetch_array($result))
										{
											echo '<option name="kuha-year" value="'.$row['year'].'">'.$row['year'].'</option>';
												
										}	
								  ?>
							</select>
						 </div>
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
<script type="text/javascript" src="../../html/item.js"></script>
<script type="text/javascript">
	function day(){
		document.getElementById("day").style.display = "block";
		document.getElementById("month").style.display = "none";
		document.getElementById("year").style.display = "none";
	}
	function month(){
		document.getElementById("day").style.display = "none";
		document.getElementById("month").style.display = "block";
		document.getElementById("year").style.display = "none";
	}
	function year(){
		document.getElementById("day").style.display = "none";
		document.getElementById("month").style.display = "none";
		document.getElementById("year").style.display = "block";
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#select-day").change(function(e){//fetch data of student for logout 
				e.preventDefault();

				//var student_id=$("input[name=out_id]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "item-selected-day.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"araw":$("#select-day option:selected").text(),	//VARIABLE VISITOR_ID=

						"button":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#chart").html(response);
					}
				});
			})
		$("#select-month").change(function(e){//fetch data of student for logout 
				e.preventDefault();

				//var student_id=$("input[name=out_id]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "item-selected-month.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"month":$("#select-month option:selected").text(),	//VARIABLE VISITOR_ID=

						"button":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#chart").html(response);
					}
				});
			})
		$("#select-year").change(function(e){//fetch data of student for logout 
				e.preventDefault();

				//var student_id=$("input[name=out_id]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "item-selected-year.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"year":$("#select-year option:selected").text(),	//VARIABLE VISITOR_ID=

						"button":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#chart").html(response);
					}
				});
			})
	});
</script>
