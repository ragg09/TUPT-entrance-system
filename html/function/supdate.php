<?php
require("../../php/config.php");
		if (isset($_POST['supdate'])){
			date_default_timezone_set('Asia/Manila');
			$oid = $_POST['student_id'];
			$gatepass = $_POST['gatepass'];
			$date=date('Y-m-d H:i:s');
			$newdate = date("Y-m-d H:i:s",strtotime($date));
			

			$query = "UPDATE logs SET 
			TIME_OUT = '$date' 
			WHERE student_STUDENT_ID = '". $oid ."'";
			$result = mysqli_query($mysqli, $query);

			
			$query2 = "UPDATE item_log SET Time_OUT = '$date' WHERE GATEPASS_NO = '". $gatepass ."'";
			$result2 = mysqli_query($mysqli, $query2);
		}

?>
<center><h1>STUDENT'S LOGOUT</h1></center>
				<hr>
				<div class="avatar_logout">	
				</div>

				<div id="stud_fetch_out">
					<table>
						<tr>
								<td><h3>ID No.: </h3></td>
								<td><input type="input" id="out_id" name="out_id" value=""></td>
								<td><input type="submit"  name="" id="stud_fetch_out_button"><!-- style="background-color: transparent; border-color: transparent; color: transparent;" -->
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

					<center>
						<h3>Code: </h3>
						<input type="input" name="gatepass" value="" id="fetch_item">
						<h3>Items:</h3>
						<textarea style="margin: 0px; min-height: 158px; min-width: 379px; max-height: 158px; max-width: 379px;" disabled="disabled"></textarea>
					</center>
				
				<div id="stud_out" style="text-align: center;">	
					<input type="submit"  name="submitout" id="sub_out" style="height: 50px; width: 100px;">		
				</div>