<?php

$con=mysqli_connect("localhost","root","","aumdb");
//$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
// Check connection
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . 	mysqli_connect_error();
}

$MID=$_POST["MID"];
$result = mysqli_query($con,"SELECT * FROM member where  MID=$MID");
$arr=array();

$row = mysqli_fetch_object($result);
$arr[] = $row;

//$str .= "<li><h1>name:" . $row['name'] . " password:" . $row['password'] . "</h1></li>";  	

echo json_encode($arr);

mysqli_close($con);
?>
