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
 


 
    

   	$conn->close();    
		    
?>