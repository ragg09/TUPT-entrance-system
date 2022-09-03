<?php
require("../../php/config.php");
// include('search.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO TUPT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../css/visitor_logs.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	 <!-- 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
	<script src="../../js/jquery-3.4.1.min.js"></script>
	 <!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<script src="../../js/60secstime.js"></script>
	<!-- hiding menu -->
	<script src="../../js/hide.js"></script>


	<script>
		$(document).ready(function(){				//AFTER LOADING THE WHOLE PAGE
			$("#visout_id").keypress(function(e){	//KEY PRESS FUNCTION IN VISOUT_ID TEXTBOX
				var key=(e.keyCode ? e.keyCode : e.which);
				if(key=='13'){						//PRESSED ENTER KEY
					e.preventDefault();				// PREVENT WEB REFRESH
					var visitor_id=$('input[name=visout_id]').val();	// ASSIGN VISITOR ID TO A JQUERY VARIABLE
					$.ajax({						//INSTANTIATE AJAX
					type: "post",					//METHOD OF THE FORM
					url: "search.php",				//ACTION OF THE FORM. AFTER THE ENTER KEY WAS PRESSED, THIS FILE WILL BE EXECUTED WITHOUT RELOADING.
					data: {							//DATA TO BE PASSED
						"visitor_id":visitor_id,	//VARIABLE VISITOR_ID=VISITOR_ID
						"search":1,					//IMAGINARY BUTTON SET TO TRUE
					},
					dataType: "text",
					success: function (response) {	//IF SUCESS, HTML TAGS WILL BE LOADED ON THE FORM WITH AN ID OF LOGOUT
						$("#LOGOUT").html(response);
					}
				});
				e.stopPropagation();
				}

			});
			$('#add_visitor').click(function (e) { 
				e.preventDefault();
				var vehicle = $(".vehicle:checked").val();
				//alert(vehicle);
				
				$("#form").load("add_visitor.php", {
					button: 1,
					name: $('input[name=fname]').val(),
					id: $('input[name=visid]').val(),
					purpose: $('select[name=purpose]').val(),
					p2visit: $('input[name=p2visit').val(),
					vehicle: vehicle,
					plate: $('input[name=plate]').val()
				});
			});
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
			<div class="b-right-left" id="visitor_log">
				<center><h1>VISITOR'S PASS</h1></center>
				<hr>
				<div id="form">
				<form id="add_log">
					<label for="logid">LOG ID: </label> &nbsp;
					<?php
					
					$query="SELECT log_id FROM logs ORDER BY log_id DESC LIMIT 1"; //Query for  retrieving the last id
					$result=$mysqli->query($query);
					$id=mysqli_fetch_array($result);
					date_default_timezone_set('Asia/Manila');
				
					if($id['log_id'] != NULL){
						$log_incremented=$id['log_id']+1; //LOG ID INCREMENTED AND DISPLAY TO THE TEXTBOX
				  	echo"<input type='text' id='logid' name='logid' placeholder='Log Id' value='".$log_incremented."'readonly> &nbsp";
					}else{
						echo"<input type='text' id='logid' name='logid' placeholder='Log Id' value='1' readonly> &nbsp"; //LOG ID IS EQUAL TO 1 WHEN THERE IS NO RESULT ON THE QUERY
					}

					echo "<br id='breaker'>";
					echo "<label for='visid'>VISITOR ID: </label> &nbsp;";
					$query="SELECT VISITOR_ID FROM visitors ORDER BY VISITOR_ID DESC LIMIT 1";
					$result=$mysqli->query($query);
					$id=mysqli_fetch_array($result);
					if($id["VISITOR_ID"] != NULL){
					$vis_array=explode("-",$id["VISITOR_ID"]);
					$next=$vis_array[2]+1;
					$vis_incremented="VIS-".date('y')."-".str_pad($next, 4,0,STR_PAD_LEFT);
				  	echo"<input type='text' id='logid' name='visid' placeholder='Log Id' value=".$vis_incremented." readonly>";
					}else{
						$vis_incremented="VIS-".date('y')."-0001";
						echo"<input type='text' id='logid' name='visid' placeholder='Log Id' value=$vis_incremented>";
					}
					?>
					<?php echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=50&text=".$vis_incremented."&print=true' id='bc1'/>";?>
				  	<table style="margin-top: 3%;">
				  		<tr>
				  			<td><label for="fname">Full Name:</label></td>
				  			<td><input type="text" id="fname" name="fname" placeholder="Name"></td>
				  			<!-- ito yung barcode -->
				  			<td><?php echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=50&text=".$vis_incremented."&print=true' id='bc2'/>";?></td>
				  		</tr>

				  		<tr>
				  			<td><label for="purpose">Purpose:</label></td>
				  			<td>

				  				<!-- POPULATE YUNG DROPDOWN NG PURPOSE -->
				  				<select style="width: 173px;" name="purpose">
				  					<option value="" selected></option><?php
                        			$query="SELECT * from purpose;";
                        			$result=$mysqli->query($query);
                        			while($row=$result->fetch_assoc()){
                            		echo"<option value='".$row['PURPOSE_ID']."'>".$row['PURPOSE']."</option>";
                        			}
                    				echo"</select>";?>
								</select>
				  			</td>
				  		</tr>

				  		<tr>
				  			<td><label for="p2visit">Person to Visit:</label></td>
				  			<td><input type="text" id="p2visit" name="p2visit" placeholder="Person to Visit"></td>
				  		</tr>

				  	</table>

				  	<fieldset>
				  		<legend><h3>VEHICLE</h3></legend>
				  		<table id="visitor_form">
						  	<tr>
						  		<td>
							  		<input type="radio" id="none" name="vehicle" class="vehicle" value="6" checked="checked" onClick="document.getElementById('plate').disabled = true;">
							  		<label for="item_laptop">None</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Motorcycle" name="vehicle" class="vehicle" value="1" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_toolbox">Motorcycle</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="radio" id="Car" name="vehicle" class="vehicle" value="2" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_projector">Car</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Truck" name="vehicle" class="vehicle" value="3" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_drawing">Truck</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="radio" id="Van" name="vehicle" class="vehicle" value="4" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_musical">Van</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Bus" name="vehicle" class="vehicle" value="5" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_sport">Bus</label>
						  		</td>
						  	</tr>
					  	</table>
				  	</fieldset>

				  	<br><br>

				  	<label for="logid">Plate Number: </label> &nbsp;
				  	<input type="text" id="plate" name="plate" placeholder="Plate Number" disabled="disabled"> 
				</form>
				</div>
				<input type="submit" value="Submit" id="add_visitor" style="height: 50px; width: 50%; margin-top: 5%; margin-left: 25%; font-size: 40px;">
			</div>




			<div class="b-right-right">
				<center><h1>VISITOR'S LOGOUT</h1></center>

				<hr>
				<center>
				  		
				  			<label for="visid">VISITOR ID: </label>
				  			<input type="text" placeholder="Visitor ID" name="visout_id" id="visout_id" value="">

				  		<form action="" id="LOGOUT">

				  		</form>
				</center> 	
				  </form>
			</div>
		</div>
	</div>

	<div class="footer">
		<b><p>ALL RIGHTS RESERVED | Yatat Boys &copy;</p></b>
	</div>
</div>



</body>
</html>