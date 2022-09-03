<?php
 require("../../php/config.php");
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\LeastSquares;


//laptop 
$x = [[1], [2], [3], [4], [5]];
$y = [5, 10, 15, 20, 25];
 
$regression = new LeastSquares();
$regression->train($x, $y);
echo $regression->predict([6]);