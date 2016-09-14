<?php
	require_once('connection.php');
	include "../libchart/classes/libchart.php";

    // Graph generation
	header("Content-type: image/png");

	$chart = new HorizontalBarChart(500, 170);
	$dataSet = new XYDataSet();

	$sql = "SELECT keyword, count FROM report";
	$result = $connection->query($sql);

	$row = $result->fetch_row();

	while(!($row == NULL)) {
    	foreach($row as $key => $value) {
    		if($key == 0) { $keyword = $value; }
    		if($key == 1) { $count = $value; }
    	}
		$dataSet->addPoint(new Point($keyword, $count));
		$row = $result->fetch_row();
    }

	$chart->setDataSet($dataSet);
	$chart->setTitle("Search Queries - Report");
	$chart->render();
?>