<?php
require("../../php/config.php");
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\LeastSquares;
if (isset($_POST['button'])){
	date_default_timezone_set('Asia/Manila');
	$item = $_POST['item'];

	if($item !== 'Others'){
		$query = "SELECT ITEM_ID FROM items WHERE ITEM = '". $item ."'";
		$result=mysqli_query($mysqli, $query);
		while($row=mysqli_fetch_array($result))
		{
			$id = $row['ITEM_ID'];										
		}

		for($i=1; $i<=5; $i++){
				$sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, {$id})");
				$row = mysqli_fetch_row($sql);
				$item_y[] = $row[0];
				mysqli_next_result($mysqli);

		}
	}
	
	if($item === 'Others'){
		for($i=1; $i<=5; $i++){
				$sql = mysqli_query($mysqli,"CALL predictothermonth({$i})");	
				$row = mysqli_fetch_row($sql);
				$item_y[] = $row[0];
				mysqli_next_result($mysqli);

		}
	}
	
	$x = [[1], [2], [3], [4], [5]];	
	
	$totalitem = 0;
	$reg_item = new LeastSquares();
	$reg_item->train($x, $item_y);
	//predicting 7 months ahead based from 7 months before
	for($i = 1; $i <= 7; $i++) {
	    ${'regitem'.$i} = $reg_item->predict([count($x)+$i]);

	    $totalitem += ${'regitem'.$i};
	}

}

?>

<script>
	google.charts.load('current', {'packages': ['table', 'corechart']});
	google.charts.setOnLoadCallback(drawchart);

	function drawchart(){
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'monthS PREDICTED');
		data.addColumn('number', 'Total');
		data.addRows([
			["<?php echo date('M', strtotime(' + 1 month')); ?>",<?php echo $regitem1; ?>],
			["<?php echo date('M', strtotime(' + 2 month')); ?>",<?php echo $regitem2; ?>],
			["<?php echo date('M', strtotime(' + 3 month')); ?>",<?php echo $regitem3; ?>],
			["<?php echo date('M', strtotime(' + 4 month')); ?>",<?php echo $regitem4; ?>],
			["<?php echo date('M', strtotime(' + 5 month')); ?>",<?php echo $regitem5; ?>],
		]);

		var options = {
			'title' : 'SPECIFIC PREDICTION OF <?php echo strtoupper($item); ?>',
      		'height' : '100%',
      		'width' : '100%',
      		'backgroundColor': {
		        'fill': '#F4F4F4',
		        'opacity': 100
		     },
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>


</body>
</html>