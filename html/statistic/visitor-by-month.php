<!-- path: tupt-entrace/html/statistic/visitor-by-month.php -->
<?php 
require("../../php/config.php");

$_GET['month'] = "month";

if (isset($_GET['month'])) {
	$query = mysqli_query($mysqli, "
		SELECT DATE_FORMAT(TIMEIN, \"%M %d %Y\") AS `Dates`, COUNT(TIMEIN) AS `Visitors` FROM visitor_analytics WHERE TIMEIN >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) GROUP BY TIMEIN 
	");

	while($result = mysqli_fetch_array($query)){
		$output[$result['Dates']] = $result['Visitors'];
	}
}
//print_r($output);
?>
<script>
	google.charts.load('current', {'packages': ['table', 'corechart']});
	google.charts.setOnLoadCallback(drawchart);

	function drawchart(){
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Visitors By This Month');
		data.addColumn('number', 'Total');
		data.addRows([
		<?php foreach ($output as $key => $value): ?>	
			[<?php echo "'".$key."'";  ?> , <?php echo $value; ?>],
		<?php endforeach ?>
		]);

		var options = {
			'title' : 'Total number of visitors within this curdate and interval of 1 month!!!',
      		'height' : 300
		};

		var chart = new google.visualization.PieChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>
</body>
</html>