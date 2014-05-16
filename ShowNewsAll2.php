    <?php
       $con=mysqli_connect("localhost","root","","aumdb");
    //$con=mysqli_connect("mysql.hostinger.in.th","u851641548_aumdb","123456a","u851641548_aumdb");
            if (mysqli_connect_errno($con))
            {
                 echo "Failed to connect to MySQL: " .   mysqli_connect_error();
            }
            mysql_query("SET NAMES UTF8");

    function utf8_urldecode($str) {
        return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, '');
        //return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
    }   

    //$result = mysqli_query($con,"SELECT * FROM  newspressrelease");
    $result = mysqli_query($con," SELECT * FROM news01 INNER JOIN newspressrelease ON  news01.NID = newspressrelease.FKN3ID ");
    $arr = array();

    while($row = mysqli_fetch_object($result))
    {    
        $arr[] = $row;
    }
        echo json_encode($arr);

        mysqli_close($con);
    ?>
