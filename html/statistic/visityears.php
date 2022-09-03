<?php 
require("../../php/config.php");
// <!-- path: tupt-entrance/html/statistic/visityears.php -->

// get all the years present in the database
if(isset($_GET['year'])){
	$year = $_GET['year'];
}
$i = 1; 
while ($i <= 12) {
	$sql = mysqli_query($mysqli,"CALL getvisitbyyear({$i}, {$year})");
	$row = mysqli_fetch_row($sql);
	$month['month_'.$i] = $row[0];
	mysqli_next_result($mysqli);
	$i++;
} 
echo json_encode($month);
?>