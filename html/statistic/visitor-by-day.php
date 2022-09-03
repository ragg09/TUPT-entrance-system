<!-- path: tupt-entrance/html/statistic/visitor-by-day.php -->
<?php 
require("../../php/config.php");

$_GET['day'] = "day";

if (isset($_GET['day'])) {
	$query = mysqli_query($mysqli, "
		SELECT COUNT('TIMEIN') as 'totalvisit' 
		FROM visitor_analytics 
		WHERE TIMEIN = NOW(); 
	");

	while($result = mysqli_fetch_array($query)){
		$output =  array(
			'totalvisit' => $result['totalvisit']
		);
	}
}
?>
<script>
	google.charts.load('current', {'packages': ['table', 'corechart']});
	google.charts.setOnLoadCallback(drawchart);

	function drawchart(){
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Visitors By This Day');
		data.addColumn('number', 'Total');
		data.addRows([
			["Total" , <?php echo $output['totalvisit'] ?>],
		]);

		var options = {
			'title' : 'Total number of visitors within this day!!!',
      		'height' : 300
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>
</body>
</html>