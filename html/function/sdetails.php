<?php
require("../../php/config.php");
	if(isset($_POST['button']))
	{
		$id = $_POST['student_id'];
		$query = "SELECT STUDENT_ID, NAME, COURSE_COURSE_ID FROM student WHERE STUDENT_ID = '". $id ."'";
		$result=mysqli_query($mysqli, $query);
			while($row=mysqli_fetch_array($result))
			{
				$stud_id = $row["STUDENT_ID"];
				$stud_name = $row["NAME"];
				$stud_course = $row["COURSE_COURSE_ID"];
			}
	}
?>
	

	<div id="stud_details">
							<table>
		<tr>
			<td><h3>Name: </h3></td>
			<td><input type="text" name="name" disabled="" placeholder="echo data" value=" <?php echo $stud_name; ?>" ></td>
		</tr>
		<tr>
			<td><h3>Course: </h3></td>
			<td><input type="text" name="course" disabled="" placeholder="echo data" value=" <?php echo $stud_course; ?>"></td>
		</tr>
		<!-- <tr>
		<td><h3>ID No.: </h3></td>
			<td><input type="text" name="id" id="student_id" placeholder="echo data" autofocus="" value="<?php echo $stud_id; ?>"></td>
			<td><input type="submit"  name="submit" style="background-color: transparent; border-color: transparent; color: transparent;" >
			</td>
		</tr> -->
	</table>
	</div>