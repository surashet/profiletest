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

	$FKMID2=$_POST["CMK2"];
	$FKNID2=$_POST["NID2"];
	$Detail2=$_POST["AddCmd2"];

	$Detail2 = utf8_urldecode($Detail2);

	$result = mysqli_query($con,"INSERT INTO comment VALUES (NULL,'$FKNID2',NULL,'$FKMID2','$Detail2')");
	
	echo "ADDComment Complete..** " ;//. $Detail2 ;
	mysqli_close($con);
?>