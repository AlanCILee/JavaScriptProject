<?php
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";

	$returnMsg = "Failed to Remove!";
	
	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_POST["id"]))
    {
		$rID = intval($_POST["id"]);
	}
	
	$sql = "DELETE FROM AGENT WHERE agent_ID={$rID}";
	//$result = mysqli_query($conn, $sql);
	
	if (mysqli_query($conn, $sql))
	{
		$returnMsg = "Realtor Removed!";
	}
	
	echo $returnMsg;

	mysqli_close($conn);
?>