<?php

$con=mysqli_connect("localhost","root","","aumdb");
//$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
// Check connection
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . 	mysqli_connect_error();
}
  mysql_query("SET NAMES UTF8");

    function utf8_urldecode($str) {
        return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, '');
       // return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
    }

$NID=$_POST["NID"];

$result = mysqli_query($con,"SELECT * FROM news01 where  NID=$NID");
$arr=array();

$row = mysqli_fetch_object($result);
$arr[] = $row;

//$str .= "<li><h1>name:" . $row['name'] . " password:" . $row['password'] . "</h1></li>";  	
if(!$arr)
	{
		echo mysql_error();
	}
	
else
echo json_encode($arr);

mysqli_close($con);
?>
