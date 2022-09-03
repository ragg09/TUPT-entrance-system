<?php
require("../../php/config.php");
if (isset($_POST['button'])){
	date_default_timezone_set('Asia/Manila');
	$kuha_araw = $_POST['araw'];
	$araw = date("d", strtotime($kuha_araw));
		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 1)");
		$row = mysqli_fetch_row($sql);
		$laptop = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 2)");
		$row = mysqli_fetch_row($sql);
		$toolbox = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 3)");
		$row = mysqli_fetch_row($sql);
		$projector = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 4)");
		$row = mysqli_fetch_row($sql);
		$drawing = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 5)");
		$row = mysqli_fetch_row($sql);
		$music = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getitembyday({$araw}, 6)");
		$row = mysqli_fetch_row($sql);
		$sport = $row[0];
		mysqli_next_result($mysqli);

		$sql = mysqli_query($mysqli,"CALL getotherbyday({$araw})");
		$row = mysqli_fetch_row($sql);
		$other = $row[0];
		mysqli_next_result($mysqli);

		$sum = $laptop+$toolbox+$projector+$drawing+$music+$sport+$other;

}

?>

<script>
	google.charts.load('current', {'packages': ['table', 'corechart']});
	google.charts.setOnLoadCallback(drawchart);

	function drawchart(){
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'TOTAL ITEM OF THE DAY');
		data.addColumn('number', 'Total');
		data.addRows([
			["Laptop",<?php echo $laptop; ?>],
			["Toolbox",<?php echo $toolbox; ?>],
			["Projector",<?php echo $projector; ?>],
			["Drawing",<?php echo $drawing; ?>],
			["Music",<?php echo $music; ?>],
			["Sport",<?php echo $sport; ?>],
			["Other",<?php echo $other; ?>],
		]);

		var options = {
			'title' : 'Date: <?php echo date("M-d-Y",strtotime($kuha_araw));?> || Total: <?php echo $sum; ?>',
      		'height' : 300
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>
</body>
</html>