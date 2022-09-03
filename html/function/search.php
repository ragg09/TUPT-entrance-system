<?php
require("../../php/config.php");
if(isset($_POST['search'])){
	date_default_timezone_set('Asia/Manila');
	$time=date('Y-m-d H:i:s');
	$id=$_POST['visitor_id'];
	// $databaseHost = 'localhost';
	// $databaseName = 'tup_db';
	// $databaseUsername = 'root';
	// $databasePassword = '';
	 
	// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	// mysqli_select_db($mysqli,$databaseName);

	$query="SELECT l.LOG_ID, l.Time_IN, l.Time_OUT, l.MODE_OF_ENTRY_MODE_OF_ENTRY_ID, v.NAME, v.VISITOR_ID, p.PURPOSE,v.person_to_visit from logs l inner join visitors V on l.visitors_visitor_id=v.visitor_id inner join purpose p on v.purpose_purpose_id=p.purpose_id where l.visitors_visitor_id='$id' AND l.Time_OUT IS NULL;";
	$execute=$mysqli->query($query);
    if(mysqli_num_rows($execute)>0){
		$result=mysqli_fetch_array($execute);
		$query="UPDATE logs SET TIME_OUT=? where VISITORS_VISITOR_ID=?";
    	$statement=mysqli_prepare($mysqli,$query);
    	$statement->bind_param("ss",$time,$id);
    	$statement->execute();
    	if($statement->affected_rows===1){
			echo "VISITOR number ".$id." has logged out on ".$time;
			$statement->close();
		}
    	if($result['MODE_OF_ENTRY_MODE_OF_ENTRY_ID']=="2"){


    		$query="SELECT l.LOG_ID, l.Time_IN, l.Time_OUT, l.MODE_OF_ENTRY_MODE_OF_ENTRY_ID, v.NAME, v.VISITOR_ID, p.PURPOSE,v.person_to_visit,vh.plate_number,c.vehicle_type from logs l inner join visitors V on l.visitors_visitor_id=v.visitor_id inner join purpose p on v.purpose_purpose_id=p.purpose_id inner join visitor_vehicle_logs vh on vh.visitors_visitor_id=v.visitor_id inner join vehicle c on c.classification=vh.vehicle_classification where v.visitor_id='$id' AND l.Time_OUT='$time'";
    		$execute=$mysqli->query($query);
			$result=mysqli_fetch_array($execute);
				?>
				<table>
					<tr>
				  		<td><label for="fname">Full Name:</label></td>
				  		<td><input type="text" id="vout_fname" name="fname" placeholder="Name" value="<?php echo $result['NAME'];?>" readonly ></td>
				  	</tr>

				  	<tr>
				  		<td><label for="purpose">Purpose:</label></td>
				  		<td><input type="text" id="vout_purpose" name="purpose" placeholder="Purpose" value="<?php echo $result['PURPOSE'];?>" readonly ></td>
				  	</tr>

			  		<tr>
			  			<td><label for="p2visit">Person to Visit:</label></td>
			  			<td><input type="text" id="vout_p2visit" name="p2visit" placeholder="Person to Visit" value="<?php echo $result['person_to_visit'];?>" readonly></td>
			  		</tr>

			  		<tr>
			  			<td><label for="vehicle">Vehicle:</label></td>
			  			<td><input type="text" id="vout_vehicle" name="vehicle" placeholder="Vehicle" value="<?php echo $result['vehicle_type'];?>" readonly></td>
			  		</tr>

			  		<tr>
			  			<td><label for="logid">Plate Number: </label></td>
			  			<td><input type="text" id="plate" name="plate" placeholder="Plate Number" value="<?php echo $result['plate_number'];?>" readonly></td>
			  			<td><input type="hidden" name="logid" value="<?php echo $result['log_id'];?>" name=""></td>
					</tr>
				</table>
				<?php
			
    	}else{
			?>
			<table>
			<tr>
			<td><label for="fname">Full Name:</label></td>
			<td><input type="text" id="vout_fname" name="fname" placeholder="Name" value="<?php echo $result['NAME'];?>" readonly ></td>
		</tr>

		<tr>
			<td><label for="purpose">Purpose:</label></td>
			<td><input type="text" id="vout_purpose" name="purpose" placeholder="Purpose" value="<?php echo $result['PURPOSE'];?>" readonly ></td>
		</tr>

		<tr>
			<td><label for="p2visit">Person to Visit:</label></td>
			<td><input type="text" id="vout_p2visit" name="p2visit" placeholder="Person to Visit" value="<?php echo $result['person_to_visit'];?>" readonly></td>
		</tr>

		<tr>
			<td><label for="vehicle">Vehicle:</label></td>
			<td><input type="text" id="vout_vehicle" name="vehicle" placeholder="Vehicle" value="N/A" readonly></td>
		</tr>

		<tr>
			<td><label for="logid">Plate Number: </label></td>
			<td><input type="text" id="plate" name="plate" placeholder="Plate Number" value="N/A" readonly></td>
			<td><input type="hidden" name="logid" value="<?php echo $result['log_id'];?>" name=""></td>
		</tr>
			</table>
		<?php
    	}
    }else{
		echo "NO RECORD FOUND.";
	}
}



