<?php

    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
   	$sql = $_POST['query'];
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   
            
    $result = $conn->query($sql) or die("Query: ($sql) [problem]");
 	$resultArr = array();  

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        	$resultArr[] = $row;
        }		        
        echo json_encode($resultArr);		        
    } else {
        echo "0 results";
    }  

   	$conn->close();    
		    
?>