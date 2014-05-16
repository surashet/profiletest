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

	$SID=$_POST["SID"];
	$WorkPlace=$_POST["WorkPlace"];
	$GPA=$_POST["GPA"];
	$Skill=$_POST["Skill"];
	$Age=$_POST["Age"];
	$NickName=$_POST["NickName"];

	$WorkPlace = utf8_urldecode($WorkPlace);
	$Skill = utf8_urldecode($Skill);
	$detail = utf8_urldecode($detail);
	$NickName = utf8_urldecode($NickName);

	$result = mysqli_query($con,"INSERT INTO userstudent VALUES ($SID,'$WorkPlace','$GPA','$Skill','$Age','$NickName')");
	echo "Sign up Complete..** ";// .$SID. $WorkPlace. $GPA. $Skill. $Age. $NickName ;
	mysqli_close($con);
?>