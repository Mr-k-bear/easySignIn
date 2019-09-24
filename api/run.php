<?php
	
	$gml=$_REQUEST["gml"];
	$name=$_REQUEST["name"];
	$user=$_REQUEST["user"];

	if(!$gml || !$name || !user) {
		echo "信息错误";
        exit;
	}
	
	date_default_timezone_set('Asia/Shanghai');
	$data=json_decode(file_get_contents("../data.json"),true);
	

	function ipaddress() {
		global $ip;
		if(getenv("HTTP_CLIENT_IP")){
			$ip=getenv("HTTP_CLIENT_IP");
		}
		else if(getenv("HTTP_X_FORWARDED_FOR")){
			$ip=getenv("HTTP_X_FORWARDED_FOR");
		}
		else if(getenv("REMOTE_ADDR")){
			$ip=getenv("REMOTE_ADDR");
		}
		else{
			$ip="Unknow";
		}
	   return $ip;
	}

	$newData=[$gml,$name,$user,date('Y-m-d h:i:s', time()),ipaddress()];
	array_push($data,$newData);
	
	$json=fopen("../data.json", "w");
	fwrite($json, json_encode($data));
	fclose($json);

	echo "签到成功!";