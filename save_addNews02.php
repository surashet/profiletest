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

	$Money=$_POST["Money"];
	$Line=$_POST["Line"];
	$FKS3ID = $_POST["FKS"];

	$Link=$_POST["Link2"];
	$detail=$_POST["Detail2"];
	$Head=$_POST["Head2"];

	$Line = utf8_urldecode($Line);
	$detail = utf8_urldecode($detail);
	$Head = utf8_urldecode($Head);
	
	$result2 = mysqli_query($con,"INSERT INTO news01 VALUES (NULL,'$Link','$detail','','$Head')");
	$last_id = mysqli_insert_id($con);

	$result3 = mysqli_query($con,"INSERT INTO newspressrelease VALUES (NULL,'$Money','$Line','$FKS3ID','$last_id')");



	if(!$result3)
	{
		//echo mysql_error();
		echo "error";
	}
	else 
		echo "ADD Complete..** " ;//. $Money. $Line. $FKS3ID;

	mysqli_close($con);

?>