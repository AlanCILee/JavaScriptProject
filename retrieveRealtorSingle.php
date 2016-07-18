<?php
	//echo "DEBUG MESSAGE PHP A";
	
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";
    
    //$realtorID = $_POST["id"];
    $realtorID = intval($_POST["id"]);

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT agent_name, location, phone, email, bio, imgsource FROM AGENT WHERE agent_ID= {$realtorID}";
    $result = mysqli_query($conn, $sql);
    
   
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
	        //put function call here?
	        $name = $row["agent_name"];
	        $location = $row["location"];
	        $phone = $row["phone"];
	        $mail = $row["email"];
	        $bio = $row["bio"];
	        $isrc = $row["imgsource"];
				
			$data = $name . ":" . $location . ":" . $phone . ":" . $mail . ":" . $bio . ":" . $isrc; //string
			//echo $name;
			echo json_encode($data);
		}      
    } 
    else 
    {
        echo "0 results";
    }

    mysqli_close($conn);
?>

