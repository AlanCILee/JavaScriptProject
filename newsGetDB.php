<?php
	ini_set("memory_limit", "-1");

    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
   	$sql = $_POST['query'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, 'utf8mb4');
    $result = $conn->query($sql) or die("Query: ($sql) [problem]");
 	$resultArr = array();
	$resultNum = mysqli_num_rows($result);
	$resultArr['elementCount'] = $resultNum;

  //$number = $resultNum;

    if ($resultNum > 0) {

        while($row = mysqli_fetch_assoc($result))
         {
        	$resultArr[] = $row;

        }

    }

    //$test = array();
    //$test[] = $resultNum;

  echo $resultNum;
//  echo json_encode($resultArr);

  //echo json_encode($resultArr);
   //echo json_encode($test);


   	$conn->close();

?>
