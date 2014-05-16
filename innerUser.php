  <?php 
 	$con=mysqli_connect("localhost","root","","aumdb");
    //$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
            if (mysqli_connect_errno($con))
            {
                 echo "Failed to connect to MySQL: " .   mysqli_connect_error();
            }

 	$result = mysqli_query($con," SELECT * FROM member INNER JOIN userstudent ON  member.MID = userstudent.SID ");
    $arr = array();

    while($row = mysqli_fetch_object($result))
    {    
        $arr[] = $row;
    }
        echo json_encode($arr);

        mysqli_close($con);
   ?>