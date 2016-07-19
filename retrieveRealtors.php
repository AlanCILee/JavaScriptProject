<?php
	//echo "DEBUG MESSAGE PHP A";
	
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
    
    

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT agent_name, location, phone, email, bio, imgsource, agent_ID FROM AGENT ORDER BY agent_name ASC";
    $result = mysqli_query($conn, $sql);
    
    //echo "<script type='text/javascript'>alert('debug');</script>";
    if (mysqli_num_rows($result) > 0) 
    {
        $dataArray = array();
        
        
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
            //put function call here?
            $name = $row["agent_name"];
            $location = $row["location"];
            $phone = $row["phone"];
            $mail = $row["email"];
            $bio = $row["bio"];
            $isrc = $row["imgsource"];
            $aID = $row["agent_ID"];
			
			$data = $name . ":" . $location . ":" . $phone . ":" . $mail . ":" . $bio . ":" . $isrc . ":" . $aID; //string
			array_push($dataArray, $data);
			//echo $name;
			
        }
        
        echo json_encode($dataArray);
    } 
    else 
    {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>

