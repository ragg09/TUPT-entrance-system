<?php
require("../../php/config.php");
		if (isset($_POST['supdate'])){
			date_default_timezone_set('Asia/Manila');
			$gatepass = $_POST['gatepass'];
			$date=date('Y-m-d H:i:s');
			$newdate = date("Y-m-d H:i:s",strtotime($date));
			
			$query2 = "UPDATE item_log SET Time_OUT = '$date' WHERE GATEPASS_NO = '". $gatepass ."'";
			$result2 = mysqli_query($mysqli, $query2);
		}

?>
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