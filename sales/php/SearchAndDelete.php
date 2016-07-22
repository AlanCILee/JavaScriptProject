<?php
/*http://ec2-52-201-212-193.compute-1.amazonaws.com/phpmyadmin/*/

    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user18";
    $password = "s2016a_user18";
    $dbname = "s2016a_user18";
 

//============================  SEARCH button clicked     ==============================
/*if(isset($_POST["address"])){
 	$address = $_POST["address"];
    }*/
  //  $tempAdd = $_POST["ad"];
// ===================================     DELETE button clicked     ==========================    
/*if(isset($_POST["del"])){
    $delete = $_POST["del"];
    $address2 = $_POST["address2"];
	}*/

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
		 
//============================  SEARCH button clicked     ==============================

		 if(isset($_POST["address"]))
		 {
		 	
		 $address = $_POST["address"];
		 
		 $sql = "Select propertyID, address, city, postalCode, roomCnt, bathCnt, category, description, sqFt,price, imgPath From formTest ";
		 $sql .= " where address ='" . $address . "' order by propertyID asc ";

		 $result = mysqli_query($conn, $sql) or die("Query: ($sql) [problem]");
		    $fields = mysqli_num_fields($result);

		    if (mysqli_num_rows($result) > 0) 
		    {
		        // output data of each row
		        
		        while($row = mysqli_fetch_row($result)) {
		            display("<tr>","\n");
		            for ($i=0; $i < $fields; $i++) {
		                display("<td>" , $row[$i] . "</td>");
		            }
		            display("</tr>","\n");
		        }
		    }
			else {
			        echo "<strong>0 results</strong>";
			    }
		 }
	   /* mysqli_close($conn);*/		
// ===================================     DELETE button clicked     ==========================    
		
		elseif(isset($_POST["del"]))
		   {
    		$delete = $_POST["del"];
    		$address2 = $_POST["address2"];
    
			if (!$conn) 
			{
		        die("Connection failed: " . mysqli_connect_error());
			}  
			
			$conn->query("Delete From formTest where propertyID = $delete");
			

		    

// =======================    re-display records after DELETE    =====================
		        
		 $sql = "Select propertyID, address, city, postalCode, roomCnt, bathCnt, category, description, sqFt,price, imgPath From formTest ";
		 $sql .= " where address ='" . $address2 . "' order by propertyID asc ";
// and EMPLOYEE NUMBER

		        
		       $result = $conn->query($sql) or die("Query: ($sql) [problem]");
		 
		        if ($result->num_rows > 0) {
		            // output data of each row
		            $fields = mysqli_num_fields($result);
		            
		        if (mysqli_num_rows($result) > 0) 
				    {
				        // output data of each row
				        
				        while($row = mysqli_fetch_row($result)) {
				            display("<tr>","\n");
				            for ($i=0; $i < $fields; $i++) {
				                display("<td>" , $row[$i] . "</td>");
				            }
				            display("</tr>","\n");
				        }
				    }
				}
		           else 
		        {
			        echo "<strong>0 results</strong>";
		        }
		    echo '<script> clearAll();</script>';
     		echo "<script>alert('ID deleted successfully');</script>";  
		    } 

 
     $conn->close();
     
    
    // =================     transfer display() results back to HTML  =====================
    function display($tag , $value) {
        echo $tag . $value ;
    }

?>