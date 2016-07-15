<?php
	ini_set("memory_limit", "-1");
	
    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
   	$sql = $_POST['query'];
//    $sql = "SELECT imgPath,roomCnt,bathCnt,sqFt,address,description,price From Sales order by propertyID desc limit 28";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   
    mysqli_set_charset($conn, 'utf8mb4');        
    $result = $conn->query($sql) or die("Query: ($sql) [problem]");
 	$resultArr = array();  
	$resultNum = mysqli_num_rows($result);


    if ($resultNum > 0) {
    	
    	$resultArr['elementCount'] = $resultNum; 	
        while($row = mysqli_fetch_assoc($result)) {
        	$resultArr[] = $row;
        }	
	        
        echo json_encode($resultArr);		        
		        
/*		json_encode($resultArr);		        
		echo json_last_error_msg();*/
    } else {
        echo "0 results";
    }  

   	$conn->close();    
		    
?>