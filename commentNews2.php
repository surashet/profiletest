    <?php
        $con=mysqli_connect("localhost","root","","aumdb");
    //$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
            if (mysqli_connect_errno($con))
            {
                 echo "Failed to connect to MySQL: " .   mysqli_connect_error();
            }

    $NID2=$_POST["NID4"];

   // $result1 = mysqli_query($con,"SELECT * FROM comment INNER JOIN news01 where FKNID ");
    $result2 = mysqli_query($con,"SELECT * FROM comment where  FKNID = $NID2 ");

    $arr2 = array();

    while($row = mysqli_fetch_object($result2))
    {    
        $arr2[] = $row;
    }
        echo json_encode($arr2);

        mysqli_close($con);
    ?>
