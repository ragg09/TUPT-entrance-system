<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO TUPT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../css/items_logs.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	 <!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<!-- <script src="../../js/60secstime.js"></script> -->
	<script src="../../js/jquery-3.4.1.min.js"></script>
	<!-- hiding menu -->
	<script src="../../js/hide.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		$("#stud_insert").click(function(e){
				e.preventDefault();
					$("#extra").load("item_logs_insert.php #extra", {
						button: 1,
						student_id: $('input[name=id]').val(),
						//item
						item_laptop: $("input[name='item_laptop']:checked").val(),
						item_toolbox: $("input[name='item_toolbox']:checked").val(),
						item_projector: $("input[name='item_projector']:checked").val(),
						item_drawing: $("input[name='item_drawing']:checked").val(),
						item_musical: $("input[name='item_musical']:checked").val(),
						item_sport: $("input[name='item_sport']:checked").val(),
						item_other: $('input[name=item_other]').val(),
					});
					document.getElementById("student_id").value="";
			})	

		$("#fetch_item").keypress(function(e){//fetch data of ITEM
			var key=(e.keyCode ? e.keyCode : e.which);
				if(key=='13'){
				e.preventDefault();

				$("#item_data").load("item_details.php", {
						button: 1,
						gatepass: $('input[name=gatepass]').val(),
					});
				}
			})

		$("#sub_out").click(function(e){ //button for logout /update
				e.preventDefault();

				var gatepass=$("input[name=gatepass]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "item_logout.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED	//VARIABLE VISITOR_ID=
						"gatepass":gatepass,
						"supdate":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#for_lougout").html(response);
					}
				});
			})
	});

	</script>
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
			<div class="b-right-left">
				<center><h1>ITEM'S LOGIN</h1></center>
				<hr>
				<br>
				<center>
				<table>
					<tr>
						<td><h1>ID No: </h1></td>
						<td><input type="text" name="id" id="student_id" placeholder="" autofocus="" value="" style="height: 25px; width: 300px;"></td>

					</tr>
				</table>
				</center>

				<center><h2>ITEM</h2></center>
					<div id="extra">
					  <table id="item_form">
							  	<tr>
							  		<td>
								  		<input type="checkbox" id="item_laptop" name="item_laptop" value="1" >
								  		<label for="item_laptop">Laptop</label>
							  		</td>
							  		<td>
								  		<input type="checkbox" id="item_toolbox" name="item_toolbox" value="2">
								  		<label for="item_toolbox">Tool Box</label>
							  		</td>
							  	</tr>
							  	<tr>
							  		<td>
								  		<input type="checkbox" id="item_projector" name="item_projector" value="3">
								  		<label for="item_projector">Projector</label>
							  		</td>
							  		<td>
								  		<input type="checkbox" id="item_drawing" name="item_drawing" value="4">
								  		<label for="item_drawing">Drawing Material</label>
							  		</td>
							  	</tr>
							  	<tr>
							  		<td>
								  		<input type="checkbox" id="item_musical" name="item_musical" value="5">
								  		<label for="item_musical">Musical Instrument</label>
							  		</td>
							  		<td>
								  		<input type="checkbox" id="item_sport" name="item_sport" value="6">
								  		<label for="item_sport">Sport's Item</label>
							  		</td>
							  	</tr>
							  	<tr>
							  		<td>
							  			<label for="item_other">Others: </label>
								  		<input type="text" id="item_other" name="item_other">	
							  		</td>
							  		<td>
								  		<input type="submit" name="submit2" id="stud_insert" style="width: 50%;">				
									</td>
							  	</tr>
							</table>
					</div>		
			</div>
			<div class="b-right-right" id="for_lougout">

				<center><h1>ITEM LOGOUT</h1></center>
				<hr>

				<div id="item_data"><!-- id="item_data" -->
					<center>
						<h3>Code: </h3>
						<input type="input" name="gatepass" value="" id="fetch_item">
						<h3>Items:</h3>
						<textarea style="margin: 0px; min-height: 158px; min-width: 379px; max-height: 158px; max-width: 379px;" disabled="disabled" placeholder=""></textarea>
					</center>
				</div><!-- id="item_data" -->	
				
				<div id="stud_out" style="text-align: center;">	
					<input type="submit"  name="submitout" id="sub_out" style="height: 50px; width: 100px;">		
				</div>

			</div>
		</div>
	</div>

	<div class="footer">
		<b><p>ALL RIGHTS RESERVED | Yatat Boys &copy;</p></b>
	</div>
</div>
</body>
</html>