<?php
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
    
    $sql = "SELECT agent_name, location, phone, email, bio, imgsource FROM AGENT";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) 
    {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
            //put function call here?
        }
    } 
    else 
    {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>