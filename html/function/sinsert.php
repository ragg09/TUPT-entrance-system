<?php
require("../../php/config.php");
if(isset($_POST['button'])){
	//for student
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d H:i:s');
	$newdate = date("Y-m-d H:i:s",strtotime($date));
	$student_student_id = $_POST['student_id'];

	//vehicle
	$mode_of_entry = $_POST['entry'];

	$trapping = TRUE;

	$query = "SELECT student_STUDENT_ID FROM logs WHERE student_STUDENT_ID = '". $student_student_id ."' AND Time_IN IS NOT NULL AND Time_OUT IS NULL";
	$result=mysqli_query($mysqli, $query);
			while($row=mysqli_fetch_array($result))
			{
				$trapping = FALSE;
			}

	if($trapping !== FALSE){
	//item

		if(isset($_POST['item_laptop']) || isset($_POST['item_toolbox']) || isset($_POST['item_projector']) || isset($_POST['item_drawing']) || isset($_POST['item_musical']) || isset($_POST['item_sport']) || $_POST['item_other']!==""){

			$item1="";
		 	$item2="";
		 	$item3="";
		 	$item4="";
		 	$item5="";
		 	$item6="";
		 	$item7="";

		 	if(isset($_POST['item_laptop'])){
		 		$item1 = 1;
		 	}
		 	if(isset($_POST['item_toolbox'])){
		 		$item2 = 2;
		 	}
		 	if(isset($_POST['item_projector'])){
		 		$item3 = 3;
		 	}
		 	if(isset($_POST['item_drawing'])){
		 		$item4= 4;
		 	}
		 	if(isset($_POST['item_musical'])){
		 		$item5 = 5;
		 	}
		 	if(isset($_POST['item_sport'])){
		 		$item6 = 6;
		 	}
		 	if(isset($_POST['item_other']) && $_POST['item_other']!==""){
		 		$item7_text = $_POST['item_other'];
		 		$item7 = 7;
		 	}



		 	$stud_id = str_replace("TUPT", "", $student_student_id);
		 	$stud_id = str_replace("-", "", $stud_id);
		 	$items = $item1.$item2.$item3.$item4.$item5.$item6.$item7;
		 	$date = date("md");
		 	$gatepass = $stud_id.$items.$date;
		 	//this comment below is to show the barcode 
	 		//echo "<img alt='testing' src='generate_barcode.php?codetype=Code39&size=60&text=".$gatepass."&print=true'/>";

	 		//insert to student log
			$q = "INSERT INTO logs (Time_IN, student_STUDENT_ID, MODE_OF_ENTRY_MODE_OF_ENTRY_ID) VALUES (?,?,?)";
			$query = mysqli_prepare($mysqli, $q);
			$query->bind_param("ssi",$newdate, $student_student_id, $mode_of_entry);
			$query->execute() or Die(mysqli_error($mysqli)); 

			if($query->affected_rows===1){
				// echo "successfully inserted!";
				$query->close();
			}

	 		//insert to item log
			$q_item = "INSERT INTO item_log (GATEPASS_NO, Time_IN, STUDENT_STUDENT_ID) VALUES (?,?,?)";
			$query_item = mysqli_prepare($mysqli, $q_item);
			$query_item->bind_param("sss",$gatepass,$newdate, $student_student_id,);
			$query_item->execute() or Die(mysqli_error($mysqli)); 

			if($query_item->affected_rows===1){
				// echo "successfully inserted!";
				$query_item->close();
			}

				// for($i = 0; $i <= 7; $i++){

				// 	if($item[$i]!==""){
				//  		$q_item[$i] = "INSERT INTO item_gatepass(items_ITEM_ID, gatepasss_number) VALUES (?,?)";
				// 		$query_item[$i] = mysqli_prepare($mysqli, $q_item.$i);
				// 		$query_item[$i]->bind_param("is",$item.$i,$gatepass);
				// 		$query_item[$i]->execute() or Die(mysqli_error($mysqli)); 

				// 		if($query_item.$i->affected_rows===1){
				// 			// echo "successfully inserted!";
				// 			$query_item.$i->close();
				// 		}
				//  	}
				// }

				if($item1!==""){
			 		$q_item1 = "INSERT INTO item_gatepass(items_ITEM_ID, gatepasss_number) VALUES (?,?)";
					$query_item1 = mysqli_prepare($mysqli, $q_item1);
					$query_item1->bind_param("is",$item1,$gatepass);
					$query_item1->execute() or Die(mysqli_error($mysqli)); 

					if($query_item1->affected_rows===1){
						// echo "successfully inserted!";
						$query_item1->close();
					}
			 	}

			 	if($item2!==""){
		 			$q_item2 = "INSERT INTO item_gatepass(items_ITEM_ID,gatepasss_number) VALUES (?,?)";
					$query_item2 = mysqli_prepare($mysqli, $q_item2);
					$query_item2->bind_param("is",$item2,$gatepass);
					$query_item2->execute() or Die(mysqli_error($mysqli)); 

					if($query_item2->affected_rows===1){
						// echo "successfully inserted!";
						$query_item2->close();
					}
			 	}

			 	if($item3!==""){
			 		$q_item3 = "INSERT INTO item_gatepass(items_ITEM_ID,gatepasss_number) VALUES (?,?)";
					$query_item3 = mysqli_prepare($mysqli, $q_item3);
					$query_item3->bind_param("is",$item3,$gatepass);
					$query_item3->execute() or Die(mysqli_error($mysqli)); 

					if($query_item3->affected_rows===1){
						// echo "successfully inserted!";
						$query_item3->close();
					}
			 	}

			 	if($item4!==""){
			 		$q_item4 = "INSERT INTO item_gatepass(items_ITEM_ID,gatepasss_number) VALUES (?,?)";
					$query_item4 = mysqli_prepare($mysqli, $q_item4);
					$query_item4->bind_param("is",$item4,$gatepass);
					$query_item4->execute() or Die(mysqli_error($mysqli)); 

					if($query_item4->affected_rows===1){
						// echo "successfully inserted!";
						$query_item4->close();
					}
			 	}

			 	if($item5!==""){
			 		$q_item5 = "INSERT INTO item_gatepass(items_ITEM_ID,gatepasss_number) VALUES (?,?)";
					$query_item5 = mysqli_prepare($mysqli, $q_item5);
					$query_item5->bind_param("is",$item5,$gatepass);
					$query_item5->execute() or Die(mysqli_error($mysqli)); 

					if($query_item5->affected_rows===1){
						// echo "successfully inserted!";
						$query_item5->close();
					}
			 	}

			 	if($item6!==""){
			 		$q_item6 = "INSERT INTO item_gatepass(items_ITEM_ID,gatepasss_number) VALUES (?,?)";
					$query_item6 = mysqli_prepare($mysqli, $q_item6);
					$query_item6->bind_param("is",$item6,$gatepass);
					$query_item6->execute() or Die(mysqli_error($mysqli)); 

					if($query_item6->affected_rows===1){
						// echo "successfully inserted!";
						$query_item6->close();
					}
			 	}

			 	if($item7!==""){
			 		$q_item7 = "INSERT INTO temp_items(item_specified,gatepasss_number) VALUES (?,?)";
					$query_item7 = mysqli_prepare($mysqli, $q_item7);
					$query_item7->bind_param("ss",$item7_text,$gatepass);
					$query_item7->execute() or Die(mysqli_error($mysqli)); 

					if($query_item7->affected_rows===1){
						// echo "successfully inserted!";
						$query_item7->close();
					}
			 	}

		}
		else{
			//insert to student log
			$q = "INSERT INTO logs (Time_IN, student_STUDENT_ID, MODE_OF_ENTRY_MODE_OF_ENTRY_ID) VALUES (?,?,?)";
			$query = mysqli_prepare($mysqli, $q);
			$query->bind_param("ssi",$newdate, $student_student_id, $mode_of_entry);
			$query->execute() or Die(mysqli_error($mysqli)); 

			if($query->affected_rows===1){
				// echo "successfully inserted!";
				$query->close();
			} 

		}
	}
	
}
?>
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
						<center><h2>MODE OF ENTRY</h2></center>
						  <table id="mode_of_entry">
							  	<tr>
							  		<td>
								  		<input type="radio" id="Walk-in" name="Vehicle" value="1" checked="checked">
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

						<hr>
						<center><h2>ITEM</h2></center>

						  <table id="item_form">
						  	<tr>
						  		<td>
							  		<input type="checkbox" id="item_laptop" name="item_laptop" value="item_laptop" >
							  		<label for="item_laptop">Laptop</label>
						  		</td>
						  		<td>
							  		<input type="checkbox" id="item_toolbox" name="item_toolbox" value="item_toolbox">
							  		<label for="item_toolbox">Tool Box</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="checkbox" id="item_projector" name="item_projector" value="item_projector">
							  		<label for="item_projector">Projector</label>
						  		</td>
						  		<td>
							  		<input type="checkbox" id="item_drawing" name="item_drawing" value="item_drawing">
							  		<label for="item_drawing">Drawing Material</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="checkbox" id="item_musical" name="item_musical" value="item_musical">
							  		<label for="item_musical">Musical Instrument</label>
						  		</td>
						  		<td>
							  		<input type="checkbox" id="item_sport" name="item_sport" value="item_sport">
							  		<label for="item_sport">Sport's Item</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
						  			<label for="item_other">Others: </label>
							  		<input type="text" id="item_other" name="item_other">	
						  		</td>
						  		<td><input type="submit" name="submit2" id="stud_insert"></td>
						  		<!-- <div>
						  			<td>
						  				<input type="submit" name="submit2" id="stud_insert">					
						  			</td>
						  		</div>
						  		 -->
						  	</tr>
						  </table>
					</div>