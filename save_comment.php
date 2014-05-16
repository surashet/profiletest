<?php
	//mysql_connect("localhost","root","");
	//mysql_select_db("aumdb");
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

	$FKMID=$_POST["CMK"];
	$FKNID=$_POST["NID"];
	$Detail=$_POST["AddCmd"];

	$Detail = utf8_urldecode($Detail);

	$result = mysqli_query($con,"INSERT INTO comment VALUES (NULL,'$FKNID',NULL,'$FKMID','$Detail')");
	echo "ADDComment Complete..** " ;//. $Detail ;
	mysqli_close($con);
?>