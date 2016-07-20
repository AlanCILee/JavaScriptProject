<?php
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";

	$returnMsg = "Failed to add Realtor!";
	
	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_POST["name"]))
    {
		$rName = $_POST["name"];
		//$returnMsg = "SET OKAY";
	}
	
	if (isset($_POST["loc"]))
    {
		$rLoc = $_POST["loc"];
	}
    
    if (isset($_POST["phone"]))
    {
		$rPhone = $_POST["phone"];
	}
	
	if (isset($_POST["mail"]))
    {
		$rMail = $_POST["mail"];
	}
	
	if (isset($_POST["bio"]))
    {
		$rBio = $_POST["bio"];
	}
	
	$sql = "INSERT INTO AGENT (agent_name, location, phone, email, bio) VALUES (?, ?, ?, ?, ?)"; 
	//$result = mysqli_query($conn, $sql);
	
	if($statement = $conn->prepare($sql))
    { 
    	$statement->bind_param("sssss", $rName, $rLoc, $rPhone, $rMail, $rBio);
    	
    	if ($statement->execute())
    	{
			$returnMsg = "Realtor Added!";
		}
		else
		{
			$returnMsg = "Failed to add Realtor!";
		}
    }
	
	//if (mysqli_query($conn, $sql))
	//{
	//	$returnMsg = "INSERT SUCCESSFUL";
	//}
	
	echo $returnMsg;

	mysqli_close($conn);
?>