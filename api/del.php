<?php
	
	$index=$_REQUEST["index"];

	$data=json_decode(file_get_contents("../data.json"),true);
	array_splice($data, $index, 1);

	$json=fopen("../data.json", "w");
	fwrite($json, json_encode($data));
	fclose($json);

	echo json_encode($data);