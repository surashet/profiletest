    <?php
        $con=mysqli_connect("localhost","root","","aumdb");
    //$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
            if (mysqli_connect_errno($con))
            {
                 echo "Failed to connect to MySQL: " .   mysqli_connect_error();
            }

    //$result = mysqli_query($con,"SELECT * FROM  comment where FKNID = NID");
    $result = mysqli_query($con," SELECT * FROM comment INNER JOIN news01 ON  comment.FKNID = news01.NID ");
    $arr = array();

    while(  $row = mysqli_fetch_object($result))
    {    
        $arr[] = $row;
    }
        echo json_encode($arr);

        mysqli_close($con);
    ?>
