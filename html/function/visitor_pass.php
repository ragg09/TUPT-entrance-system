<?php
require("../../php/config.php");?>
<center><h1>VISITOR'S PASS</h1></center>
<hr>
<!-- <form id="add_log"> -->
	<label for="logid">LOG ID: </label> &nbsp;
	<?php
    	$query="SELECT log_id FROM logs ORDER BY log_id DESC LIMIT 1"; //Query for  retrieving the last id
		$result=$mysqli->query($query);
		$id=mysqli_fetch_array($result);
		if($id['log_id'] != NULL){
    		$log_incremented=$id['log_id']+1; //LOG ID INCREMENTED AND DISPLAY TO THE TEXTBOX
		  	echo"<input type='text' id='logid' name='logid' placeholder='Log Id' value='".$log_incremented."'readonly> &nbsp";
		}else{
			echo"<input type='text' id='logid' name='logid' placeholder='Log Id' value='1' readonly> &nbsp"; //LOG ID IS EQUAL TO 1 WHEN THERE IS NO RESULT ON THE QUERY
		}
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
					
  	<table style="margin-top: 3%;">
  		<tr>
 			<td><label for="fname">Full Name:</label></td>
  			<td><input type="text" id="fname" name="fname" placeholder="Name"></td>
  			<!-- ito yung barcode -->
  			<td><?php echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=50&text=".$vis_incremented."&print=true'/>";?></td>
  		</tr>

  		<tr>
  			<td><label for="purpose">Purpose:</label></td>
  			<td>
			<!-- POPULAT YUNG DROPDOWN NG PURPOSE -->
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
							  		<input type="radio" id="none" name="vehicle" value="6" checked="checked" onClick="document.getElementById('plate').disabled = true;">
							  		<label for="item_laptop">None</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Motorcycle" name="vehicle" value="1" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_toolbox">Motorcycle</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="radio" id="Car" name="vehicle" value="2" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_projector">Car</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Truck" name="vehicle" value="3" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_drawing">Truck</label>
						  		</td>
						  	</tr>
						  	<tr>
						  		<td>
							  		<input type="radio" id="Van" name="vehicle" value="4" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_musical">Van</label>
						  		</td>
						  		<td>
							  		<input type="radio" id="Bus" name="vehicle" value="5" onClick="document.getElementById('plate').disabled = false;">
							  		<label for="item_sport">Bus</label>
						  		</td>
						  	</tr>
					  	</table>
				  	</fieldset>

				  	<br><br>

				  	<label for="logid">Plate Number: </label> &nbsp;
				  	<input type="text" id="plate" name="plate" placeholder="Plate Number" disabled="disabled"> 
				  	<input type="submit" value="Submit" name="add_visitor" id= style="height: 50px; width: 50%; margin-top: 5%; margin-left: 25%; font-size: 40px;">
				<!-- </form>  -->