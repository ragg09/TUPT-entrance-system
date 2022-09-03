<?php
require("../../php/config.php");
	if(isset($_POST['sout']))
	{
		$oid = $_POST['student_id'];
		$query = "SELECT student.STUDENT_ID, student.NAME, student.COURSE_COURSE_ID, logs.MODE_OF_ENTRY_MODE_OF_ENTRY_ID FROM student
		INNER JOIN logs ON student.STUDENT_ID = logs.student_STUDENT_ID
		WHERE STUDENT_ID = '". $oid ."'";
		$result=mysqli_query($mysqli, $query);
		while($row=mysqli_fetch_array($result))
		{
			$stud_id2 = $row["STUDENT_ID"];
			$stud_name2 = $row["NAME"];
			$stud_course2 = $row["COURSE_COURSE_ID"];
			$stud_entry2 = $row["MODE_OF_ENTRY_MODE_OF_ENTRY_ID"];

			$query2 = "SELECT MODE_OF_ENTRY FROM mode_of_entry WHERE MODE_OF_ENTRY_ID = '". $stud_entry2 ."'";
			$result2=mysqli_query($mysqli, $query2);
			while($row2=mysqli_fetch_array($result2))
			{
				$entry = $row2["MODE_OF_ENTRY"];
			}
		}
	}
else
	{
	$stud_id2 = "";
	$stud_name2 = "";
	$stud_course2 = "";
	$stud_entry2 = "";
	}
?>



<table>
	<tr>
		<td><h3>ID No.: </h3></td>
		<td><input type="input" id="out_id" name="out_id" value="<?php echo $oid; ?>"></td>
		<td><input type="submit"  name="" id="stud_fetch_out_button"><!-- style="background-color: transparent; border-color: transparent; color: transparent;" -->
		</td>
	</tr>
	<tr>	
		<td><h3>Name: </h3></td>
		<td><input type="input" name="out_name" value="<?php echo $stud_name2; ?>" disabled="disabled"></td>
	</tr>
	<tr>
		<td><h3>Course: </h3></td>
		<td><input type="input" name="out_course" value="<?php echo $stud_course2; ?>" disabled="disabled"></td>
	</tr>
						
	<tr>
		<td><h3>Mode of Entry: </h3></td>
		<td><input type="input" name="out_mode" value="<?php echo $entry; ?>" disabled="disabled"></td>
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

