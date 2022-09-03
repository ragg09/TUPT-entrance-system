<?php
 require("../../php/config.php");
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\LeastSquares;

    
$_GET['month'] = "month";

if (isset($_GET['month'])) {
  //laptop y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 1)");
      $row = mysqli_fetch_row($sql);
      $laptop_y[] = $row[0];
      mysqli_next_result($mysqli);

  }
  //toolbox y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 2)");
      $row = mysqli_fetch_row($sql);
      $toolbox_y[] = $row[0];
      mysqli_next_result($mysqli);
  }
  //projector y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 3)");
      $row = mysqli_fetch_row($sql);
      $projector_y[] = $row[0];
      mysqli_next_result($mysqli);
  }
  //drawing y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 4)");
      $row = mysqli_fetch_row($sql);
      $drawing_y[] = $row[0];
      mysqli_next_result($mysqli);
  }
  //music y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 5)");
      $row = mysqli_fetch_row($sql);
      $music_y[] = $row[0];
      mysqli_next_result($mysqli);
  }
  //sport y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictbymonth({$i}, 6)");
      $row = mysqli_fetch_row($sql);
      $sport_y[] = $row[0];
      mysqli_next_result($mysqli);
  }   
  //other y setting
  for($i=1; $i<=5; $i++){
      $sql = mysqli_query($mysqli,"CALL predictothermonth({$i})");
      $row = mysqli_fetch_row($sql);
      $other_y[] = $row[0];
      mysqli_next_result($mysqli);
  }
  //x axis
$x = [[1], [2], [3], [4], [5]];

//laptop 
$totallaptop = 0;
$reg_laptop = new LeastSquares();
$reg_laptop->train($x, $laptop_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'reglaptop'.$i} = $reg_laptop->predict([count($x)+$i]);

    $totallaptop += ${'reglaptop'.$i};
}

//toolbox
$totaltoolbox = 0;
$reg_toolbox = new LeastSquares();
$reg_toolbox->train($x, $toolbox_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regtoolbox'.$i} = $reg_toolbox->predict([count($x)+$i]);
    $totaltoolbox += ${'regtoolbox'.$i};
}  

//projector
$totalprojector = 0;
$reg_projector = new LeastSquares();
$reg_projector->train($x, $projector_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regprojector'.$i} = $reg_projector->predict([count($x)+$i]);
    $totalprojector = ${'regprojector'.$i};
}

//drawing
$totaldrawing = 0; 
$reg_drawing = new LeastSquares();
$reg_drawing->train($x, $drawing_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regdrawing'.$i} = $reg_drawing->predict([count($x)+$i]);
    $totaldrawing += ${'regdrawing'.$i};
}

//music
$totalmusic = 0;
$reg_music = new LeastSquares();
$reg_music->train($x, $music_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regmusic'.$i} = $reg_music->predict([count($x)+$i]);
    $totalmusic += ${'regmusic'.$i};
}

//sport
$totalsport = 0;
$reg_sport = new LeastSquares();
$reg_sport->train($x, $sport_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regsport'.$i} = $reg_sport->predict([count($x)+$i]);
    $totalsport += ${'regsport'.$i};
}

//other
$totalother = 0;
$reg_other = new LeastSquares();
$reg_other->train($x, $music_y);
//predicting 7 months ahead based from 7 months before
for($i = 1; $i <= 5; $i++) {
    ${'regother'.$i} = $reg_other->predict([count($x)+$i]);
    $totalother += ${'regother'.$i};
}

//for the sake of pie chart
if($totallaptop < 0){
  $totallaptop = 0;
}

if($totaltoolbox < 0){
  $totaltoolbox = 0;
}

if($totalprojector < 0){
  $totalprojector = 0;
}

if($totaldrawing < 0){
  $totaldrawing = 0;
}

if($totalmusic < 0){
  $totalmusic = 0;
}

if($totalsport < 0){
  $totalsport = 0;
}

if($totalother < 0){
  $totalother = 0;
}

// print_r($laptop_y) . "<br>";
// print_r($toolbox_y) . "<br>";
// print_r($projector_y) . "<br>";
// print_r($drawing_y) . "<br>";
// print_r($music_y) . "<br>";
// print_r($sport_y) . "<br>";
// print_r($other_y) . "<br>";


}


?>
<script>
    google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'month');
      data.addColumn('number', 'Laptop');
      data.addColumn('number', 'Toolbox');
      data.addColumn('number', 'Projector');
      data.addColumn('number', 'Drawing');
      data.addColumn('number', 'Music');
      data.addColumn('number', 'Sport');
      data.addColumn('number', 'Other');

      data.addRows([
        [1, <?php echo $reglaptop1 ?>, <?php echo $regtoolbox1 ?>, <?php echo $regprojector1 ?>, <?php echo $regdrawing1 ?>, <?php echo $regmusic1 ?>, <?php echo $regsport1 ?>, <?php echo $regother1 ?>],
        [2, <?php echo $reglaptop2 ?>, <?php echo $regtoolbox2 ?>, <?php echo $regprojector2 ?>, <?php echo $regdrawing2 ?>, <?php echo $regmusic2 ?>, <?php echo $regsport2 ?>, <?php echo $regother2 ?>],
        [3, <?php echo $reglaptop3 ?>, <?php echo $regtoolbox3 ?>, <?php echo $regprojector3 ?>, <?php echo $regdrawing3 ?>, <?php echo $regmusic3 ?>, <?php echo $regsport3 ?>, <?php echo $regother3 ?>],
        [4, <?php echo $reglaptop4 ?>, <?php echo $regtoolbox4 ?>, <?php echo $regprojector4 ?>, <?php echo $regdrawing4 ?>, <?php echo $regmusic4 ?>, <?php echo $regsport4 ?>, <?php echo $regother4 ?>],
        [5, <?php echo $reglaptop5 ?>, <?php echo $regtoolbox5 ?>, <?php echo $regprojector5 ?>, <?php echo $regdrawing5 ?>, <?php echo $regmusic5 ?>, <?php echo $regsport5 ?>, <?php echo $regother5 ?>],
      ]);

      var options = {
        chart: {
          title: 'PREDICTED ITEMS FOR THE NEXT 5 months',
          subtitle: 'data was based from last 5 months',
        },
        width: 900,
        height: 500,
        'backgroundColor': {
            'fill': '#F4F4F4',
            'opacity': 100
         },
      };

      var chart = new google.charts.Line(document.getElementById('chart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script>

<script>
    google.charts.load('current', {'packages': ['table', 'corechart']});
  google.charts.setOnLoadCallback(drawChart);

   function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['ITEM', 'Entry From Last 5 Months'],
          ['Laptop', <?php echo $totallaptop; ?>],
          ['Toolbox', <?php echo $totaltoolbox; ?>],
          ['Projector', <?php echo $totalprojector; ?>],
          ['Drawing', <?php echo $totaldrawing; ?>],
          ['Music', <?php echo $totalmusic; ?>],
          ['Sport', <?php echo $totalsport; ?>],
          ['Other', <?php echo $totalother; ?>],
        ]);

        var options = {
          title: 'Possible Entry For Next 5 Months',
          width: '100%',
          'backgroundColor': {
            'fill': 'transparent',
         },
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart2'));

        chart.draw(data, options);
    }
</script> 