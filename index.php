<?php

$min_x = 1;
$max_x = 50;
$min_y = 1;
$max_y = 50;
$slope = -1;
$total = 60;

// Order n^2 algorithm
$count_1 = 0;
$checks_1 = '';
$results_1 = '';
for ($x = $min_x; $x <= $max_x; $x++) {
	for ($y = $min_y; $y <= $max_y; $y++) {
		$count_1++;
		$checks_1 .= '(' . $x . ',' . $y . ') ';
		if (($x + $y) == $total) {
			$results_1 .= '(' . $x . ',' . $y . ') ';
		}
	}
}

// Ordern alogrithm
$count_2 = 0;
$checks_2 = '';
$results_2 = '';
for ($x = $min_x; $x <= $max_x; $x++) {
	$count_2++;
	$y = ($slope * $x) + $total;
	$checks_2 .= '(' . $x . ',' . $y . ') ';
	if ($y >= $min_y && $y <= $max_y) {
		$results_2 .= '(' . $x . ',' . $y . ') ';
	}
}

// Order n alogrithm
$count_3 = 0;
$checks_3 = '';
$results_3 = '';
$start_x = $total - $max_y;
$stop_x = $max_x;
for ($x = $start_x; $x <= $stop_x; $x++) {
	$count_3++;
	$y = ($slope * $x) + $total;
	$checks_3 .= '(' . $x . ',' . $y . ') ';
	if ($y >= $min_y && $y <= $max_y) {
		$results_3 .= '(' . $x . ',' . $y . ') ';
	}
}

// Order n alogrithm
// Taking advantage of pairs of numbers are not ordered.
$count_4 = 0;
$checks_4 = '';
$results_4 = '';
$start_x = $total - $max_y;
$stop_x = $max_x;
if ($slope == -1) {
	$min_x_needed = $total - $max_y;
	$stop_x = $min_x_needed;
	$stop_x += floor(($max_x - $stop_x) / 2);
	$stop_x = ($max_x - $min_x_needed) % 2 == 1 ? $stop_x + 1 : $stop_x;
}
for ($x = $start_x; $x <= $stop_x; $x++) {
	$count_4++;
	$y = ($slope * $x) + $total;
	$checks_4 .= '(' . $x . ',' . $y . ') ';
	if ($y >= $min_y && $y <= $max_y) {
		$results_4 .= '(' . $x . ',' . $y . ') ';
	}
}

?>
<html>
	<head>
		<title>Johnson &amp; Johnson exercise</title>
		<style>
			h1 { font-size: 18px;}
			label {font-weight: bold;}
		</style>
	</head>
	<body>

		<h1>#1: Order n^2 alogrithm</h1>
		<label>Checks:</label> <?php print_r($count_1); ?> 
		<br /><br />
		<label>Checked:</label> <?php print_r($checks_1); ?> 
		<br /><br />
		<label>Matches:</label> <?php print_r($results_1); ?> 

		<hr>

		<h1>#2: Order n algorithm</h1> 
		<label>Checks:</label> <?php print_r($count_2); ?> 
		<br /><br />
		<label>Checked:</label> <?php print_r($checks_2); ?> 
		<br /><br />
		<label>Matches:</label> <?php print_r($results_2); ?> 

		<hr>

		<h1>#3: Order n algorithm as whiteboarded</h1> 
		<label>Checks:</label> <?php print_r($count_3); ?> 
		<br /><br />
		<label>Checked:</label> <?php print_r($checks_3); ?> 
		<br /><br />
		<label>Matches:</label> <?php print_r($results_3); ?> 

		<hr>

		<h1>#4: Order n algorithm with slope of -1 improvements.</h1> 
		<label>Checks:</label> <?php print_r($count_4); ?> 
		<br /><br />
		<label>Checked:</label> <?php print_r($checks_4); ?> 
		<br /><br />
		<label>Matches:</label> <?php print_r($results_4); ?>

	</body>
</html>