<!DOCTYPE html>
<html>
<head>
	<title>STUDENT LOGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../css/student_logs.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	<!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
	<script src="../../js/jquery-3.4.1.min.js"></script>
	<!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<script src="../../js/60secstime.js"></script>
	<!-- hiding menu -->
	<script src="../../js/hide.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

		//fetching vehicle data	
		$(".vehicle").change(function (e) {
			e.preventDefault();
			var id=$('input[name=id]').val();
			$.ajax({
				type: "POST",
				url: "fetchinbox.php",
				data: {
					"search_radio_btn": 1,
					"id": id
				},
				dataType: "text",
				success: function (response) {
					
					$("#plate_num").show();
					$("#plate_num").html(response);
				}
			});
			$("#Walk-in").change(function (e) { 
			e.preventDefault();
			// $("#plate_num").css("display", "none");

			});
		});

		$(".lakad").change(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "student_logs_lakad.php",
				data: {
					"search_radio_btn": 1,
				},
				dataType: "text",
				success: function (response) {
					$("#moe").show();
					$("#moe").html(response);
				}
			});
			$("#Walk-in").change(function (e) { 
			e.preventDefault();
			// $("#plate_num").css("display", "none");

			});
		});		

		$("#student_id").keypress(function(e){//search ng student
			var key=(e.keyCode ? e.keyCode : e.which);
				if(key=='13'){
				e.preventDefault();

				$("#stud_details").load("sdetails.php", {
						button: 1,
						student_id: $('input[name=id]').val(),
					});
				}
			})

		$("#stud_insert").click(function(e){//insert ng data para sa logs ng student
				// alert("HATDOG");
				e.preventDefault();
				$("#stud_details").load("sinsert.php #stud_details", "");

					$("#extra").load("sinsert.php #extra", {
						button: 1,
						student_id: $('input[name=id]').val(),
						//vehicle
						entry: $("input[name='Vehicle']:checked").val(),
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

		$("#stud_fetch_out_button").click(function(e){//fetch data of student for logout 
				e.preventDefault();

				var student_id=$("input[name=out_id]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "sout.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"student_id":student_id,	//VARIABLE VISITOR_ID=

						"sout":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#stud_fetch_out").html(response);
					}
				});
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

				var student_id=$("input[name=out_id]").val();
				var gatepass=$("input[name=gatepass]").val();

				$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "supdate.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"student_id":student_id,	//VARIABLE VISITOR_ID=
						"gatepass":gatepass,
						"supdate":1,				//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#for_lougout").html(response);
						document.getElementById("out_id").value="";
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
			require("../../php/config.php");
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
			<div class="b-right-left" id="b-right-left">

				<center><h1>STUDENT'S LOGIN</h1></center>
				<hr>

				<div class="avatar">
				</div>

				<br>
						<table class="tocenter">
								<tr>
									<td><h3>ID No.: </h3></td>
									<td><input type="text" name="id" id="student_id" placeholder="echo data" autofocus="" value=""></td><!-- style="background-color: transparent; border-color: transparent; color: transparent;"  -->
								</tr>
							</table>
						<div id="stud_details">
							<table>
								<tr>
									<td><h3>Name: </h3></td>
									<td><input type="text" name="name" disabled="" placeholder="echo data" value="" ></td>
								</tr>
								<tr>
									<td><h3>Course: </h3></td>
									<td><input type="text" name="course" disabled="" placeholder="echo data" value=""></td>
								</tr>
							</table>
						</div>

						<hr>
						<div id="extra">
							<div id="moe">
								<center><h2>MODE OF ENTRY</h2></center>
								  <table id="mode_of_entry">
									  	<tr>
									  		<td>
										  		<input type="radio" id="Walk-in" name="Vehicle" value="1" class="lakad" checked="checked">
										  		<label for="Walk-in">Walk-in</label>
									  		</td>
									  		<td>
										  		<input type="radio" id="Vehicle" name="Vehicle" class="vehicle" value="2">
										  		<label for="Vehicle">Vehicle</label>
									  		</td>

									  		<td id="plate_num" >
									  			<input type="text" class="txtbox" name="id" value="" style="width: 150px;" disabled="disabled">
									  		</td>  
										</tr>
									</table>
							</div>
						<hr>
						<center><h2>ITEM</h2></center>

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
							  		<td><input type="submit" name="submit2" id="stud_insert" style="width: 50%;"></td>
							  	</tr>
							</table>
						  </div>
					<div>
						<center>
						<table>
						  	<td>
						  	<tr></tr>					
							</td>
						</table>
						</center>
					</div>
			</div>
			<div class="b-right-right" id="for_lougout">

				<center><h1>STUDENT'S LOGOUT</h1></center>
				<hr>
				<div class="avatar_logout">	
				</div>

				<div id="stud_fetch_out">
					<table>
						<tr>
								<td><h3>ID No.: </h3></td>
								<td><input type="input" id="out_id" name="out_id" value=""></td>
								<td><input type="submit"  name="" id="stud_fetch_out_button">
							</td>
						</tr>
							<tr>	
								<td><h3>Name: </h3></td>
								<td><input type="input" name="out_name" value="" disabled="disabled"></td>
							</tr>
							<tr>
								<td><h3>Course: </h3></td>
								<td><input type="input" name="out_course" value="" disabled="disabled"></td>
							</tr>
						
							<tr>
								<td><h3>Mode of Entry: </h3></td>
								<td><input type="input" name="out_mode" value="" disabled="disabled"></td>
							</tr>
							<!-- lagyan ng trappings kung ung mode of entry is vehicle
							<tr> 
								<td><h3>Plate: </h3></td>
								<td><input type="input" name="content" value="" disabled="disabled"></td>
							</tr> --> 
							<!-- <tr>
								<td><h3>Item/s: </h3></td>
								<td><input type="textarea" name="content" value="" disabled="disabled"></td>
							</tr> -->
							
								
					</table>
				</div>	

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