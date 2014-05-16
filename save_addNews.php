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

	$Link=$_POST["Link"];
	$detail=$_POST["Detail"];
	$Head=$_POST["Head"];

	$detail = utf8_urldecode($detail);
	$Head = utf8_urldecode($Head);

	$result = mysqli_query($con,"INSERT INTO news01 VALUES (NULL,'$Link','$detail','','$Head')");
	
	if(!$result)
	{
		echo mysql_error();
	}
	else 
	echo "ADDNEWS Complete..** ";//. $Link. $detail. $Head ;

	mysqli_close($con);
?>