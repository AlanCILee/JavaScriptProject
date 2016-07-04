<?php
    $servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
    $username = "s2016a_user18";
    $password = "s2016a_user18";
    $dbname = "s2016a_user18";
    
    $address = $_POST["add"];
    $city = $_POST["city"];
    $postal = $_POST["pos"];
    $room = $_POST["rm"];
    $bath = $_POST["bth"];
    $descp = $_POST["descp"];
    $sqft = $_POST["sqft"];
    $price = $_POST["price"];

// img input ============================================================================

// sql value inputs ==========================================================================

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }  

 $sql = "INSERT INTO formTest (address, city, postalCode, roomCnt, bathCnt, description, sqFt,price) " ;
    $sql .="VALUES (?, ?, ?, ?, ?, ?, ?, ? ) " ;
    
    
    if($statement = $conn->prepare($sql))
    	{
        //$statement->bind_param("ss", $_POST["add"], $_POST["city"], .......); 
        //OR
       
        $statement->bind_param("sssiisii", $address, $city, $postal, $room, $bath, $descp, $sqft, $price);
        $statement->execute();

    
        
        $sql = "SELECT * From formTest order by propertyid desc" ;
        
       $result = $conn->query($sql) or die("Query: ($sql) [problem]");
 
        if ($result->num_rows > 0) {
            // output data of each row
            $fields = mysqli_num_fields($result);

            $row = $result->fetch_row();
               
            display(
               	"Address: " . $row[1]. "<br/>". 
      			"City: " . $row[2]. "<br/>".
      			"Postal Code: " . $row[3]. "<br/>".
      			"Number of Rooms: " . $row[4]. "<br/>".
      			"Number of Baths: " . $row[5]. "<br/>".
      			"Description: " . $row[6]. "<br/>".
      			"Square FT: " . $row[7]. "<br/>".
      			"Price: $" . $row[8]. "<br/>" 
                    );
           

        } else {
            echo "0 results";
        }

       $statement->close();
    } else 
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    
 
   
   $conn->close();
    
    // ==========================================
    function display($value) {
        echo $value ;
    }
    function dispImg($value) {
        echo $value ;
    }
    
    
		   
    
?>