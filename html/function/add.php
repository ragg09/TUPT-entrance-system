<?php
	// $databaseHost = 'localhost';
	// $databaseName = 'tupt_db';
	// $databaseUsername = 'root';
	// $databasePassword = '';
	 
	// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	// mysqli_select_db($mysqli,$databaseName);

require("../../php/config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO TUPT</title>
	<link href="../../css/main.css" type="text/css" rel="stylesheet">
	<link href="../../css/visitor_logs.css" type="text/css" rel="stylesheet">
	<link href="../../images/TUP.png" rel="icon">
	 <!-- AUTO GO BACK TO HOME PAGE AFTER 60 SECS OF INACTIVITY -->
	<!-- <script src="../../js/60secstime.js"></script> -->
</head>
<body>
<img src="../../images/TUP.png" id="tupt-logo"/>
<div class="main-div">
	<div class="header">
		<div class="header-input">
			<a href="home.php"><input type="button" value="FUNCTION" id="active"></a>
			<a href="stats.php"><input type="button" value="STATISTICS"></a>
		</div>
	</div>

	<div class="body">
		<div class="b-left">
			<div class="b-left-input">
				<center>
					<a href="student_logs.php"><input type="button" value="STUDENT LOGS"></a>
					<a href="item_logs.php"><input type="button" value="ITEM LOGS"></a>
					<a href="visitor_logs.php"><input type="button" value="VISITOR LOGS" id="active"></a>
					<a href="vehicle_logs.php"><input type="button" value="VEHICLES LOGS"></a>
				</center>
			</div>
		</div>

		<div class="b-right">
			<div class="b-right-left">
				<center><h1>ADDING SHIT</h1></center>
				<hr>
				<form action="add_add.php" method="post" name="form1">

				  	<table style="margin-top: 3%;">
				  		<tr>
				  			<td><label for="name">Name of Student:</label></td>
				  			<td><input type="text" id="name" name="name" placeholder="Name" style="width: 400px;"></td>
				  		</tr>

				  		<tr>
				  			<td><label for="id">Student ID:</label></td>
				  			<td><input type="text" id="name" name="student_id" placeholder="ID" value="TUPT-"></td>
				  		</tr/.

				  		<tr>
				  			<td><label for="gender">gender:</label></td>
				  			<td><!-- <input type="text" id="gender" name="gender" placeholder="gender"> -->
				  				<select id="gender" name="gender" placeholder="gender">
				  					<option>MALE</option>
				  					<option>FEMALE</option>
				  				</select>
				  			</td>
				  		</tr>

				  		<tr>
				  			<td><label for="course_id">Course ID:</label></td>
				  			<td>
				  				<select name="course_id">
				  					<?php
				  						$query = "SELECT * FROM course";
				  						$result = mysqli_query($mysqli, $query);
				  						while ($row=mysqli_fetch_array($result)) {
				  							echo '<option value="'.$row['COURSE_ID'].'">'.$row['COURSE_ID'].'</option>';
				  						}
				  					?>
				  				</select>
				  			</td>
				  		</tr>

				  	</table>

				  	<input type="submit" name="submit" value="Submit" style="height: 50px; width: 50%; margin-top: 5%; margin-left: 25%; font-size: 40px;">

				  <!-- <label for="fname">First name:</label> &nbsp;
				  <input type="text" id="fname" name="fname" placeholder="Name">
				  <br>
				  <label for="lname">Last name:</label> &nbsp;
				  <input type="text" id="lname" name="lname" placeholder="Last Name">
				   <br>
				  <label for="purpose">Purpose:</label> &nbsp;
					<select>
						<option>
							Registrar
						</option>
						<option>
							Library	
						</option>
						<option>
							IT Building	
						</option>
						<option>
							Italian Building
						</option>
						<option>
							BSAD Building
						</option>
					</select>
				  <br><br> -->
				 <!--  <input type="submit" value="Submit"> -->
				</form> 
			</div>
			<div class="b-right-right">
				
			</div>
		</div>
	</div>

	<div class="footer">
		<b><p>ALL RIGHTS RESERVED | Yatat Boys &copy;</p></b>
	</div>
</div>
</body>
</html>