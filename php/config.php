<?php
	$databaseHost = 'localhost';
	$databaseName = 'tupt_db';
	$databaseUsername = 'root';
	$databasePassword = '';
	 
	$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	mysqli_select_db($mysqli,$databaseName);
?>