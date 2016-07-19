<?php
	$servername = "ec2-52-201-212-193.compute-1.amazonaws.com";
	$username = "s2016a_user14";
    $password = "s2016a_user14";
    $dbname = "s2016a_user14";

	$returnMsg = "UPDATE FAILED";
	
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
    
    if (isset($_POST["name"]))
    {
		$rName = $_POST["name"];
		$returnMsg = "SET OKAY";
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
	//$rName = $_POST["name"];
	//$rName = mysqli_real_escape_string($conn,$rName);
	//$rLoc = $_POST["loc"];
	//$rLoc = mysqli_real_escape_string($conn,$rLoc);
	//$rPhone = $_POST["phone"];
	//$rPhone = mysqli_real_escape_string($conn,$rPhone);
	//$rMail = $_POST["mail"];
	//$rMail = mysqli_real_escape_string($conn,$rMail);
	//$rBio = $_POST["bio"];
	//$rBio = mysqli_real_escape_string($conn,$rBio);

	
	$sql = "UPDATE AGENT SET agent_name='".$rName."', location='".$rLoc."', phone='".$rPhone."', email='".$rMail."', bio='".$rBio."' WHERE agent_ID={$rID}";
	//$result = mysqli_query($conn, $sql);
	
	if (mysqli_query($conn, $sql))
	{
		$returnMsg = "UPDATE SUCCESSFUL";
	}
	
	echo $returnMsg;

	mysqli_close($conn);

?>