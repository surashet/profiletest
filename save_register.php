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
        //return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, '');
		return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
	}

	$Name=$_POST["Name"];
	$Username=$_POST["Username"];
	$Password=$_POST["Password"];
	$Telephone=$_POST["Telephone"];
	$Email=$_POST["Email"];
	$Status=$_POST["Status"];

	$WorkPlace=$_POST["WorkPlace"];
	$GPA=$_POST["GPA"];
	$Skill=$_POST["Skill"];
	$Age=$_POST["Age"];
	$NickName=$_POST["NickName"];
	$StudentID=$_POST["StudentID"];

	$Name = utf8_urldecode($Name);
	$WorkPlace = utf8_urldecode($WorkPlace);
	$Skill = utf8_urldecode($Skill);
	$NickName = utf8_urldecode($NickName);
	
	$result = mysqli_query($con,"INSERT INTO member VALUES (NULL,'$Name','$Username','$Password','$Telephone','$Email','$Status')");
	$last_id = mysqli_insert_id($con); //mysqli_query($con,"SELECT LAST_INSERT_ID()");//
	//echo "id:" . $last_id;
	$result = mysqli_query($con,"INSERT INTO userstudent  VALUES ( '$last_id' ,'$WorkPlace','$GPA','$Skill','$Age','$NickName','$StudentID')");

	if(!$result)
	{
		echo mysql_error();
	}
	else 
		echo "Sign up Complete..** " ;//. $Name. $Username. $Password. $Telephone. $Email. $Status. $WorkPlace. $GPA. $Skill. $Age. $NickName ;
	mysqli_close($con);
?>