<?php 
require("../../php/config.php");
if(isset($_POST['search_radio_btn'])){
	$id = $_POST['id'];
	$query = "SELECT * FROM student_vehicle WHERE student_id = '$id';";
	$query_run=$mysqli->query($query);
	if($query_run){
		if(mysqli_num_rows($query_run)>0){
			while($row = mysqli_fetch_array($query_run)){
				?>	
					<input type="text" class="txtbox" name="id" style="width: 150px;" disabled="disabled" value="<?php echo $row['vehicle_plate'] ?>">
				<?php
			}
		}else{?>
			<input type="text" class="txtbox" name="id" style="width: 150px;"  placeholder="Register Plate No." value="">
			<div id="moe_register">
				<SELECT style="height: 30px; width: 150px;">
					<option>Choose Vehicle</option>
					<?php
						$query = "SELECT Vehicle_Type from vehicle ORDER BY Classification ASC LIMIT 2";
						$result=mysqli_query($mysqli, $query);
						while($row=mysqli_fetch_array($result))
						{
							echo '<option name="kotse"'.$row['Classification'].'">'.$row['Vehicle_Type'].'</option>';
												
						}	
					?>
				</SELECT>
			</div>
			<?php
			}
	}
}

?>