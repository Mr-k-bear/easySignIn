<?php
	$token=$_REQUEST["token"];
	$pass=$_REQUEST["pass"];

	if($pass!="aaabbb" || !$token) {
		echo "信息错误";
        exit;
	}

	$json=fopen("./token.txt", "w");
	fwrite($json, $token);
	fclose($json);

	echo file_get_contents("../data.json");