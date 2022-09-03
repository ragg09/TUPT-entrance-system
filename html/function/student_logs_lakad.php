<?php 
require("../../php/config.php");
if(isset($_POST['search_radio_btn'])){
	
}

?>

<center><h2>MODE OF ENTRY</h2></center>
								  <table id="mode_of_entry">
									  	<tr>
									  		<td>
										  		<input type="radio" id="Walk-in" name="Vehicle" value="1" class="lakad" checked="checked">
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