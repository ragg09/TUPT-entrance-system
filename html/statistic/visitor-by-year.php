<!-- path: tupt-entrance/html/statistic/visitor-by-year.php -->
<?php 
require("../../php/config.php");

// get all the years present in the database
$sql = mysqli_query($mysqli,"select DISTINCT(YEAR(TIMEIN)) as 'years' FROM visitor_analytics");
while($result = mysqli_fetch_array($sql)){
	$years[] = $result['years'];
}
?>
<select id="selectyear" name="chooseyear">
	<option value="">Select year</option>
	<?php
		foreach($years as $cyears) {
			echo '<option value="'.$cyears.'">'.$cyears.'</option>;';
		}
	  ?>
</select>
<script>
	google.charts.load('current', {'packages': ['table', 'corechart']});
	google.charts.setOnLoadCallback(drawchart);

	function loadchart(year){
		$.ajax({
			url:'visityears.php',
			method:'GET',
			data:{year:year},
			dataType: "JSON",
			success: function(data)
			{
				drawchart(data);
				// console.log(data.month_1);
			}
		});
	}


	function drawchart(chartdata){
		var jsondata = chartdata;
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Visitors By The Year');
		data.addColumn('number', 'Total');
		data.addRows([
			["Jan",parseInt(jsondata.month_1)],
			["Feb",parseInt(jsondata.month_2)],
			["Mar",parseInt(jsondata.month_3)],
			["Apr",parseInt(jsondata.month_4)],
			["May",parseInt(jsondata.month_5)],
			["Jun",parseInt(jsondata.month_6)],
			["Jul",parseInt(jsondata.month_7)],
			["Aug",parseInt(jsondata.month_8)],
			["Sep",parseInt(jsondata.month_9)],
			["Oct",parseInt(jsondata.month_10)],
			["Nov",parseInt(jsondata.month_11)],
			["Dec",parseInt(jsondata.month_12)]
		]);

		var options = {
			'title' : 'Total number of visitors throught the YEAR!!!',
      		'height' : 300
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
		chart.draw(data, options);
	}
</script>
</body>
</html>
<script>
	$(document).ready(function(){
		$('#selectyear').change(function(){
			var chooseyear = $(this).val();
	        if(chooseyear != '')
	        {
	        	loadchart(chooseyear);
	        }
		});
	});
</script>