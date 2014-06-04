<?php
	
	$con=mysqli_connect("localhost","root","","aumdb");
	//$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
	if (mysqli_connect_errno($con))
	{
  		echo "Failed to connect to MySQL: " . 	mysqli_connect_error();
	}

	mysql_query("SET NAMES UTF8");

	function utf8_urldecode($str) {
        return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, '');
		//return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
	}

	$UserName=$_POST["Username"];
	$Pass=$_POST["Password"];

	$result = mysqli_query($con,"SELECT * FROM member WHERE UserName='$UserName' AND Pass='$Pass'");
	$i=0;
	
	while($row = mysqli_fetch_array($result))
	{
		$i++; 
		$arrayLogin = array();
		array_push($arrayLogin, $row['MID']);
		array_push($arrayLogin, $row['UserName']);
		
		$jsonLogin  = json_encode($arrayLogin);

		echo $jsonLogin;
	}

	if($i==0){
		$err = json_encode('stop');
		echo $err;
	}
	

	mysqli_close($con);
?>