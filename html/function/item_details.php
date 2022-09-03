<?php
require("../../php/config.php");
	if(isset($_POST['button']))
	{
		$gatepass = $_POST['gatepass'];
	}
?>

<div id="item_data"><!-- id="item_data" -->
	<center>
		<h3>Code: </h3>
		<input type="input" name="gatepass" value="<?php echo $gatepass; ?>" id="fetch_item">
		<h3>Items:</h3>
		<textarea style="margin: 0px; min-height: 158px; min-width: 379px; max-height: 158px; max-width: 379px;" disabled="disabled"><?php 
			$query = "SELECT items_ITEM_ID FROM item_gatepass WHERE gatepasss_number = '". $gatepass ."'";
			$result=mysqli_query($mysqli, $query);
				while($row=mysqli_fetch_array($result))
				{
					$stud_item = $row["items_ITEM_ID"];

					$query2 = "SELECT ITEM FROM items WHERE ITEM_ID = '". $stud_item ."'";
					$result2=mysqli_query($mysqli, $query2);
						while($row2=mysqli_fetch_array($result2))
						{
							$item = $row2["ITEM"];
							echo $item;
							echo "\n";
							
						}

					
				}
			$query3 = "SELECT item_specified FROM temp_items WHERE gatepasss_number = '". $gatepass ."'";
			$result3=mysqli_query($mysqli, $query3);
			while($row3=mysqli_fetch_array($result3)){
				$item_other = $row3["item_specified"];
				echo $item_other;
				echo "\n";
							
			}	
		?></textarea>
	</center>
</div><!-- id="item_data" -->